import polib
from nltk import bigrams
import collections
import math 
po = polib.pofile('/Users/thaothai/Desktop/Terminology_Creation/customizableWidgets.properties.po')
english= []
bigram_eng = []
translated= []
bigram_trans = []
sents = len(po.translated_entries())
pos_pairs = []
#A function that adds counts to the each word found in the entries
def count_word(count_lang):
      count = collections.Counter(count_lang)
      return count
#A function that adds counts to allocations found in entries
def count_bigram(count_lang):
      bigram = collections.Counter(bigrams(count_lang))
      return bigram
#Create a list for english and translated terms 
for entry in po.translated_entries():
      split_word = entry.msgid.upper().split()
      split_translate = entry.msgstr.upper().split()
      for word in split_word:
            
            english.append(word)
      for word in split_translate:
            translated.append(word)
#Create a list and assign the value returned from functions
count_eng = count_word(english)
bigram_eng = count_bigram(english)
count_trans = count_word(translated)
bigram_trans = count_bigram(translated)

#Calculate the probability
prob_engwrd = {x:float(count_eng[x])/sents for x in count_eng}
prob_transwrd = {x:float(count_trans[x])/sents for x in count_trans}

for x in prob_engwrd:
      for y in prob_transwrd:
            x_mul_y = float(prob_engwrd[x])*prob_transwrd[y]
            probEngTrans = x_mul_y/sents
            PMI = math.log((probEngTrans/x_mul_y),10)
            pos_pairs.append(PMI)
            
##      for y in translation:
##            z =  x*y / sents
##            PMI = log (z)/(x*y)
## create a list of tupe {english,translate,PMI}
            
##print sents
##print count_eng
##print prob_engwrd
##print prob_transwrd

print pos_pairs
