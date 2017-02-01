import polib
import string
import re
import collections
import sys
reload(sys)
sys.setdefaultencoding('utf-8')

pofiles = ["/Users/thaothai/Desktop/terminology/ga/essential.po"]
for po_file in pofiles:
    file1 = open('/Users/thaothai/Desktop/Terminology_Creation/results/ga/ga-pootle', 'w')
    for po_file in pofiles:
        po = polib.pofile(po_file)
        NumberOfSentences= len(po.translated_entries())
        if NumberOfSentences == 0:
            continue
            #Create a list for english and translated terms
        for entry in po.translated_entries():
            word = re.sub("[0-9]|[%$&;:#!\]\[@?<>*\\=+,-\.\)\(]|[...]|[--]|{}","", entry.msgid.encode('utf-8'))
            word2 = re.sub("[0-9]|[%$&;:#!\]\[@?<>*\\=+,-\.\)\(]|[...]|[--]|{}","", entry.msgstr.encode('utf-8'))
            Source = word
            Target = word2
            if len(Source) > 1 or len(Target) > 1:
                file1.write(Source + ";" + Target + "\n")
file1.close()
