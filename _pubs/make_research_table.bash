#!/bin/bash

rm -f *.dat
php combined.php | tail -n +3 > combined_table.html
cat pub_header.txt combined_table.html > ../pubs.md
