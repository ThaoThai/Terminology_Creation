import polib
from nltk import bigrams
import collections
import math
import functions

po = polib.pofile('/Users/thaothai/Desktop/Terminology_Creation/customizableWidgets.properties.po')
Source= []
BigramSource = []
Target= []
BigramTarget = []
NumberOfSentences= len(po.translated_entries())
PossblPairs = []

#Create a list for english and translated terms 
for entry in po.translated_entries():
      SplitSource = entry.msgid.upper().split()
      SplitTarget = entry.msgstr.upper().split()
      for word in SplitSource:
            Source.append(word)
      for word in SplitTarget:
            Target.append(word)
            
#Create a list and assign the value returned from functions
CountSource = functions.count_word(Source)
CountBSource = functions.count_bigram(Source)
CountTarget= functions.count_word(Target)
CountBTarget = functions.count_bigram(Target)

#Calculate the probability
ProbabilitySource = {x:float(CountSource[x])/NumberOfSentences for x in CountSource}
ProbabilityTarget = {x:float(CountTarget[x])/NumberOfSentences  for x in CountTarget}


PossiblePMIPairs = functions.prob_language(ProbabilitySource, ProbabilityTarget, PossblPairs, NumberOfSentences)

            
##      for y in translation:
##            z =  x*y / sents
##            PMI = log (z)/(x*y)
## create a list of tupe {english,translate,PMI}
            
##print sents
##print count_eng
##print prob_engwrd
##print prob_transwrd

for x in PossiblePMIPairs:
      print x 



