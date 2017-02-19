import sys

lines = open(sys.argv[1], 'r').readlines()

lines_seen = set(lines)


f = open('test.txt', 'w')

for line in lines_seen:
	f.write(line)


#for line in outfile:
#	line = line.rstrip()
#	c = line.split(';')
#	if c[0] not in lines_seen:
#		f.write(c[0]+'\n')
#		lines_seen.add(line[0])

#outfile.close()
f.close()