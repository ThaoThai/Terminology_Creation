#!/bin/bash

clear

arr=("af" "ak" "az" "bg" "ca" "eu" "fa" "ff" "hi_IN" "hu" "ku" "lg" "lt" "mr" "nb_NO" "or" "pa" "ro" "rw" "sv" "sw" "tr" "ur" "wa")


function compare  {
	cut -d';' -f1 $1 | sort -u > $HOME/Desktop/Terminology_Creation/results/$lang/temp1
	cut -d';' -f1 $2 | sort -u > $HOME/Desktop/Terminology_Creation/results/$lang/temp2
	grep -ixf $HOME/Desktop/Terminology_Creation/results/$lang/temp2 $HOME/Desktop/Terminology_Creation/results/$lang/temp1 | sort -u  
}

for lang in ${arr[@]}
do
	echo $lang 
	pootle=$(cat $HOME/Desktop/Terminology_Creation/results/$lang/$lang-pootle | wc -l)
	#####PMI######
	pmi100=$(compare $HOME/Desktop/Terminology_Creation/results/$lang/pmi1-00 $HOME/Desktop/Terminology_Creation/results/$lang/$lang-pootle | wc -l)
	pmi075=$(compare $HOME/Desktop/Terminology_Creation/results/$lang/pmi0-75 $HOME/Desktop/Terminology_Creation/results/$lang/$lang-pootle | wc -l)
	pmi050=$(compare $HOME/Desktop/Terminology_Creation/results/$lang/pmi0-50 $HOME/Desktop/Terminology_Creation/results/$lang/$lang-pootle | wc -l)
	pmi025=$(compare $HOME/Desktop/Terminology_Creation/results/$lang/pmi0-25 $HOME/Desktop/Terminology_Creation/results/$lang/$lang-pootle | wc -l)
	pmi000=$(compare $HOME/Desktop/Terminology_Creation/results/$lang/pmi0-00 $HOME/Desktop/Terminology_Creation/results/$lang/$lang-pootle | wc -l)

	

	score100=$(echo "scale=2; $pmi100*100/$pootle" | bc)
	score075=$(echo "scale=2; $pmi075*100/$pootle" | bc)
	score050=$(echo "scale=2; $pmi050*100/$pootle" | bc)
	score025=$(echo "scale=2; $pmi025*100/$pootle" | bc)
	score000=$(echo "scale=2; $pmi000*100/$pootle" | bc)

	######MODEL#######
	mod100=$(compare $HOME/Desktop/Terminology_Creation/results/$lang/model1-00 $HOME/Desktop/Terminology_Creation/results/$lang/$lang-pootle | wc -l)
	mod075=$(compare $HOME/Desktop/Terminology_Creation/results/$lang/model0-75 $HOME/Desktop/Terminology_Creation/results/$lang/$lang-pootle | wc -l)
	mod050=$(compare $HOME/Desktop/Terminology_Creation/results/$lang/model0-50 $HOME/Desktop/Terminology_Creation/results/$lang/$lang-pootle | wc -l)
	mod025=$(compare $HOME/Desktop/Terminology_Creation/results/$lang/model0-25 $HOME/Desktop/Terminology_Creation/results/$lang/$lang-pootle | wc -l)
	mod000=$(compare $HOME/Desktop/Terminology_Creation/results/$lang/model0-00 $HOME/Desktop/Terminology_Creation/results/$lang/$lang-pootle | wc -l)

	

	model100=$(echo "scale=2; $mod100*100/$pootle" | bc)
	model075=$(echo "scale=2; $mod075*100/$pootle" | bc)
	model050=$(echo "scale=2; $mod050*100/$pootle" | bc)
	model025=$(echo "scale=2; $mod025*100/$pootle" | bc)
	model000=$(echo "scale=2; $mod000*100/$pootle" | bc)

	#####Phrases#####
	phr100=$(compare $HOME/Desktop/Terminology_Creation/results/$lang/phrase1-00 $HOME/Desktop/Terminology_Creation/results/$lang/$lang-pootle | wc -l)
	phr075=$(compare $HOME/Desktop/Terminology_Creation/results/$lang/phrase0-75 $HOME/Desktop/Terminology_Creation/results/$lang/$lang-pootle | wc -l)
	phr050=$(compare $HOME/Desktop/Terminology_Creation/results/$lang/phrase0-50 $HOME/Desktop/Terminology_Creation/results/$lang/$lang-pootle | wc -l)
	phr025=$(compare $HOME/Desktop/Terminology_Creation/results/$lang/phrase0-25 $HOME/Desktop/Terminology_Creation/results/$lang/$lang-pootle | wc -l)
	phr000=$(compare $HOME/Desktop/Terminology_Creation/results/$lang/phrase0-00 $HOME/Desktop/Terminology_Creation/results/$lang/$lang-pootle | wc -l)
	
	pscore100=$(echo "scale=2; $phr100*100/$pootle" | bc)
	pscore075=$(echo "scale=2; $phr075*100/$pootle" | bc)
	pscore050=$(echo "scale=2; $phr050*100/$pootle" | bc)
	pscore025=$(echo "scale=2; $phr025*100/$pootle" | bc)
	pscore000=$(echo "scale=2; $phr000*100/$pootle" | bc)

	echo "------------------------------------------------------"
	echo precll	"||" 0.60 "||" 0.65 "||" 0.70 "||" 0.75 "||" 0.80 | column -t -s"||"
	echo "------------------------------------------------------"
	echo PMInfo	"||" $score000 "||" $score025 "||" $score050 "||" $score075 "||" $score100| column -t -s"||"
	echo +moses	"||" $model000 "||" $model025 "||" $model050 "||" $model075 "||" $model100 | column -t -s"||"
	echo phrase "||" $pscore000 "||" $pscore025 "||" $pscore050 "||" $pscore075 "||" $pscore100 | column -t -s"||"
	echo " "
done
