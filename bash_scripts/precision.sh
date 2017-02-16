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


	pacc100=$(grep -ixf $HOME/Desktop/Terminology_Creation/results/$lang/$lang-pootle $HOME/Desktop/Terminology_Creation/results/$lang/pmi1-00 | sort -u -t';' -k1,1 | wc -l)
	pacc075=$(grep -ixf $HOME/Desktop/Terminology_Creation/results/$lang/$lang-pootle $HOME/Desktop/Terminology_Creation/results/$lang/pmi0-75  | sort -u -t';' -k1,1| wc -l)
	pacc050=$(grep -ixf $HOME/Desktop/Terminology_Creation/results/$lang/$lang-pootle $HOME/Desktop/Terminology_Creation/results/$lang/pmi0-50  |sort -u -t';' -k1,1| wc -l)
	pacc025=$(grep -ixf $HOME/Desktop/Terminology_Creation/results/$lang/$lang-pootle $HOME/Desktop/Terminology_Creation/results/$lang/pmi0-25  | sort -u -t';' -k1,1|wc -l)
	pacc000=$(grep -ixf $HOME/Desktop/Terminology_Creation/results/$lang/$lang-pootle $HOME/Desktop/Terminology_Creation/results/$lang/pmi0-00  | sort -u -t';' -k1,1|wc -l)

	

	score100=$(echo "scale=2; $pacc100*100/($pmi100+1)" | bc)
	score075=$(echo "scale=2; $pacc075*100/($pmi075+1)" | bc)
	score050=$(echo "scale=2; $pacc050*100/($pmi050+1)" | bc)
	score025=$(echo "scale=2; $pacc025*100/($pmi025+1)" | bc)
	score000=$(echo "scale=2; $pacc000*100/($pmi000+1)" | bc)

	######MODEL#######

	mod100=$(compare $HOME/Desktop/Terminology_Creation/results/$lang/model1-00 $HOME/Desktop/Terminology_Creation/results/$lang/$lang-pootle | wc -l)
	mod075=$(compare $HOME/Desktop/Terminology_Creation/results/$lang/model0-75 $HOME/Desktop/Terminology_Creation/results/$lang/$lang-pootle | wc -l)
	mod050=$(compare $HOME/Desktop/Terminology_Creation/results/$lang/model0-50 $HOME/Desktop/Terminology_Creation/results/$lang/$lang-pootle | wc -l)
	mod025=$(compare $HOME/Desktop/Terminology_Creation/results/$lang/model0-25 $HOME/Desktop/Terminology_Creation/results/$lang/$lang-pootle | wc -l)
	mod000=$(compare $HOME/Desktop/Terminology_Creation/results/$lang/model0-00 $HOME/Desktop/Terminology_Creation/results/$lang/$lang-pootle | wc -l)

	macc100=$(grep -ixf $HOME/Desktop/Terminology_Creation/results/$lang/$lang-pootle $HOME/Desktop/Terminology_Creation/results/$lang/model1-00  | wc -l)
	macc075=$(grep -ixf $HOME/Desktop/Terminology_Creation/results/$lang/$lang-pootle $HOME/Desktop/Terminology_Creation/results/$lang/model0-75  | wc -l)
	macc050=$(grep -ixf $HOME/Desktop/Terminology_Creation/results/$lang/$lang-pootle $HOME/Desktop/Terminology_Creation/results/$lang/model0-50  | wc -l)
	macc025=$(grep -ixf $HOME/Desktop/Terminology_Creation/results/$lang/$lang-pootle $HOME/Desktop/Terminology_Creation/results/$lang/model0-25  | wc -l)
	macc000=$(grep -ixf $HOME/Desktop/Terminology_Creation/results/$lang/$lang-pootle $HOME/Desktop/Terminology_Creation/results/$lang/model0-00  | wc -l)

	

	model100=$(echo "scale=2; $macc100*100/($mod100+1)" | bc)
	model075=$(echo "scale=2; $macc075*100/($mod075+1)" | bc)
	model050=$(echo "scale=2; $macc025*100/($mod050+1)" | bc)
	model025=$(echo "scale=2; $macc025*100/($mod025+1)" | bc)
	model000=$(echo "scale=2; $macc000*100/($mod000+1)" | bc)

	#####Phrases#####
	phr100=$(compare $HOME/Desktop/Terminology_Creation/results/$lang/phrase1-00 $HOME/Desktop/Terminology_Creation/results/$lang/$lang-pootle | wc -l)
	phr075=$(compare $HOME/Desktop/Terminology_Creation/results/$lang/phrase0-75 $HOME/Desktop/Terminology_Creation/results/$lang/$lang-pootle | wc -l)
	phr050=$(compare $HOME/Desktop/Terminology_Creation/results/$lang/phrase0-50 $HOME/Desktop/Terminology_Creation/results/$lang/$lang-pootle | wc -l)
	phr025=$(compare $HOME/Desktop/Terminology_Creation/results/$lang/phrase0-25 $HOME/Desktop/Terminology_Creation/results/$lang/$lang-pootle | wc -l)
	phr000=$(compare $HOME/Desktop/Terminology_Creation/results/$lang/phrase0-00 $HOME/Desktop/Terminology_Creation/results/$lang/$lang-pootle | wc -l)

	hacc100=$(grep -ixf $HOME/Desktop/Terminology_Creation/results/$lang/phrase1-00 $HOME/Desktop/Terminology_Creation/results/$lang/$lang-pootle   | wc -l)
	hacc075=$(grep -ixf $HOME/Desktop/Terminology_Creation/results/$lang/phrase0-75 $HOME/Desktop/Terminology_Creation/results/$lang/$lang-pootle   | wc -l)
	hacc050=$(grep -ixf $HOME/Desktop/Terminology_Creation/results/$lang/phrase0-50  $HOME/Desktop/Terminology_Creation/results/$lang/$lang-pootle  | wc -l)
	hacc025=$(grep -ixf $HOME/Desktop/Terminology_Creation/results/$lang/phrase0-25 $HOME/Desktop/Terminology_Creation/results/$lang/$lang-pootle   | wc -l)
	hacc000=$(grep -ixf $HOME/Desktop/Terminology_Creation/results/$lang/phrase0-00 $HOME/Desktop/Terminology_Creation/results/$lang/$lang-pootle   | wc -l)
	
	pscore100=$(echo "scale=2; $hacc100*100/($phr100+1)" | bc)
	pscore075=$(echo "scale=2; $hacc075*100/($phr075+1)" | bc)
	pscore050=$(echo "scale=2; $hacc050*100/($phr050+1)" | bc)
	pscore025=$(echo "scale=2; $hacc025*100/($phr025+1)" | bc)
	pscore000=$(echo "scale=2; $hacc000*100/($phr000+1)" | bc)

	echo "------------------------------------------------------"
	echo precis	"||" 0.60 "||" 0.65 "||" 0.70 "||" 0.75 "||" 0.80 | column -t -s"||"
	echo "------------------------------------------------------"
	echo PMInfo	"||" $score000 "||" $score025 "||" $score050 "||" $score075 "||" $score100| column -t -s"||"
	echo +moses	"||" $model000 "||" $model025 "||" $model050 "||" $model075 "||" $model100 | column -t -s"||"
	echo phrase "||" $pscore000 "||" $pscore025 "||" $pscore050 "||" $pscore075 "||" $pscore100 | column -t -s"||"
	echo " "
done
