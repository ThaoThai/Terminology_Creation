#!/bin/bash

clear

arr=("af" "ak" "az" "bg" "ca" "eu" "fa" "ff" "hi_IN" "hu" "kn" "ku" "lg" "lt" "mr" "nb_NO" "or" "pa" "ro" "rw" "sv" "sw" "tr" "ur" "wa")

for lang in ${arr[@]}
do
	cat $HOME/Desktop/Terminology_Creation/results/$lang/train/model/lex.f2e | sort -nrk 3 | sort -u -k1,1 | awk '$3 >=0.80' | awk {'print $1,$2'} | sed 's/ /;/g' |  sort -u > $HOME/Desktop/Terminology_Creation/results/$lang/model1-00
	cat $HOME/Desktop/Terminology_Creation/results/$lang/train/model/lex.f2e | sort -nrk 3 | sort -u -k1,1 | awk '$3 >=0.75' | awk {'print $1,$2'} | sed 's/ /;/g'| sort -u > $HOME/Desktop/Terminology_Creation/results/$lang/model0-75
	cat $HOME/Desktop/Terminology_Creation/results/$lang/train/model/lex.f2e | sort -nrk 3 | sort -u -k1,1 | awk '$3 >=0.70' | awk  {'print $1,$2'}  | sed 's/ /;/g'| sort -u > $HOME/Desktop/Terminology_Creation/results/$lang/model0-50
	cat $HOME/Desktop/Terminology_Creation/results/$lang/train/model/lex.f2e | sort -nrk 3 | sort -u -k1,1 | awk '$3 >=0.65' | awk {'print $1,$2'} | sed 's/ /;/g'| sort -u > $HOME/Desktop/Terminology_Creation/results/$lang/model0-25
	cat $HOME/Desktop/Terminology_Creation/results/$lang/train/model/lex.f2e | sort -nrk 3 | sort -u -k1,1 | awk '$3 >=0.60' | awk {'print $1,$2'}  | sed 's/ /;/g'| sort -u > $HOME/Desktop/Terminology_Creation/results/$lang/model0-00
done


