#!/bin/bash
source=$1
barcode=$2

curl $source -o $barcode.jpg
