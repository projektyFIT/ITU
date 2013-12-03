commands:
	latex dokumentace.tex
	bibtex dokumentace
	latex dokumentace.tex
	latex dokumentace.tex
	dvips dokumentace.dvi
	ps2pdf -sPAPERSIZE=a4 dokumentace.ps

clean:
	rm -f dokumentace.pdf dokumentace.aux dokumentace.toc dokumentace.synctex.gz dokumentace.log dokumentace.out *~ title.log dokumentace.blg
