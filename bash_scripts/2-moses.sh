#!/bin/bash

clear

arr=("scn")

arr1=("ach" "af" "ak" "ar" "az" "bg" "bm" "bn_BD" "bs" "ca" "dsb" "es_MX" "eu" "fa" "ff" "fj" "ga-IE" "gl" "gn_BO" "gn_PY" "ha" "haw" "he" "hi_IN" "hr" "hsb" "ht" "hu" "hy_AM" "id" "ig" "is" "km" "kn" "ks" "ku" "lg" "lt" "lv" "mg" "ml" "mr" "ms" "my" "nb_NO" "ne" "ny" "or" "pa" "ps" "pt" "rn" "ro" "rw" "scn" "si" "sl" "sm" "sr" "ss" "su" "sv" "sw" "ta" "te" "tk" "tl" "tn" "tr" "ts" "tt" "ur" "uz" "vec" "vi" "wa" "wo" "xh" "yo" "zu")

for lang in ${arr[@]}
do
	tokenizer.perl -l en < $HOME/Desktop/Terminology_Creation/results/$lang/working/$lang-en.en > $HOME/Desktop/Terminology_Creation/results/$lang/working/$lang-en.tok.en
	tokenizer.perl -l $lang < $HOME/Desktop/Terminology_Creation/results/$lang/working/$lang-en.$lang > $HOME/Desktop/Terminology_Creation/results/$lang/working/$lang-en.tok.$lang
##################
	train-truecaser.perl --model $HOME/Desktop/Terminology_Creation/results/$lang/working/truecase-model.en --corpus $HOME/Desktop/Terminology_Creation/results/$lang/working/$lang-en.tok.en  
	train-truecaser.perl --model $HOME/Desktop/Terminology_Creation/results/$lang/working/truecase-model.$lang --corpus $HOME/Desktop/Terminology_Creation/results/$lang/working/$lang-en.tok.$lang
#################
	truecase.perl --model $HOME/Desktop/Terminology_Creation/results/$lang/working/truecase-model.en < $HOME/Desktop/Terminology_Creation/results/$lang/working/$lang-en.tok.en > $HOME/Desktop/Terminology_Creation/results/$lang/working/$lang-en.true.en
	truecase.perl --model $HOME/Desktop/Terminology_Creation/results/$lang/working/truecase-model.$lang < $HOME/Desktop/Terminology_Creation/results/$lang/working/$lang-en.tok.$lang > $HOME/Desktop/Terminology_Creation/results/$lang/working/$lang-en.true.$lang
################
	clean-corpus-n.perl $HOME/Desktop/Terminology_Creation/results/$lang/working/$lang-en.true $lang en $HOME/Desktop/Terminology_Creation/results/$lang/working/$lang-en.clean 1 100
###############
	add-start-end.sh < $HOME/Desktop/Terminology_Creation/results/$lang/working/$lang-en.clean.en > $HOME/Desktop/Terminology_Creation/results/$lang/lm/$lang-en.sep.en
	build-lm.sh -i $HOME/Desktop/Terminology_Creation/results/$lang/lm/$lang-en.sep.en -n 3 -o $HOME/Desktop/Terminology_Creation/results/$lang/lm/$lang-en.ilm.gz -k 3
###############
	train-model.perl -root-dir $HOME/Desktop/Terminology_Creation/results/$lang/train  -external-bin-dir ~/workspace/mosesdecoder/tools  --corpus $HOME/Desktop/Terminology_Creation/results/$lang/working/$lang-en.clean -f $lang -e en -alignment grow-diag-final-and -reordering msd-bidirectional-fe --lm 0:3:$HOME/Desktop/Terminology_Creation/results/$lang/lm/$lang-en.ilm.gz:1
##############
	gunzip -k $HOME/Desktop/Terminology_Creation/results/$lang/train/model/phrase-table.gz
done

