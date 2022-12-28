CC = gcc

setLed: setLed.c
	$(CC) $(CFLAGS) $@.c $(LDFLAGS) -o $@
	sudo chown root:root setLed
	sudo chmod u+s setLed

clean:
	-rm -f setLed *.o core *.core
