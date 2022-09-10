# sstv-twitter
These scripts power the [SSTV Feed Twitter account](https://twitter.com/sstvfeed), posting recently received SSTV images to Twitter.

Inspired by an [account](https://twitter.com/mb7tv) out of the UK that posts SSTV images transmitted by a local SSTV repeater to Twitter, I thought it would be a fun challenge to try and do the same thing with images received over HF. 

Using [ON4QZ's](https://www.qrz.com/db/ON4QZ) QSSTV running on a Raspberry Pi as a base, a shell script is run every minute checking whether any new received image files have been added to QSSTV's 'rx_sstv' folder. A count of files is stored in a text file and checked against the latest count to see whether a new image is available to be posted to Twitter. 

Once a new image has been received, it's posted to Twitter through a PHP script utilizing David Grudl's [Twitter for PHP library](https://github.com/dg/twitter-php). The script selects from an array of possible messages to create variety in text content. (Twitter doesn't like to see the same text in multiple posts over and over and will lock an account if this happens. Especially when the account is new.)
