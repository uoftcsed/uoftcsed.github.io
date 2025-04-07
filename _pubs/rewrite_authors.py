#!/usr/bin/env python3
import sys
import re
from pathlib import Path

def fix_author_field(line):
    match = re.match(r'\s*author\s*=\s*[{"](.+?)[}"],?\s*$', line)
    if not match:
        return line

    authors_raw = match.group(1)
    authors = authors_raw.split(" and ")
    reformatted = []

    for name in authors:
        parts = [p.strip() for p in name.split(",")]
        if len(parts) == 2:
            firstname = parts[1]
            lastname = parts[0]
            reformatted.append(f"{firstname} {lastname}")
        else:
            reformatted.append(name)  # Leave as-is if no comma

    new_authors = " and ".join(reformatted)
    return re.sub(r'author\s*=\s*[{"].+?[}"]', f'author = {{{new_authors}}}', line)

def process_file(filepath):
    path = Path(filepath)
    if not path.exists():
        print(f"File not found: {filepath}")
        return

    lines = path.read_text(encoding="utf-8").splitlines()
    updated_lines = [fix_author_field(line) for line in lines]
    path.write_text("\n".join(updated_lines) + "\n", encoding="utf-8")
    print(f"Updated {filepath}")

if __name__ == "__main__":
    if len(sys.argv) < 2:
        print("Usage: python reformat_bib_authors.py file1.bib [file2.bib ...]")
        sys.exit(1)

    for bibfile in sys.argv[1:]:
        process_file(bibfile)

