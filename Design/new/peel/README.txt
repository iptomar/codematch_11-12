- Open file 'peel/peel.js' with notepad

- Find: 

peel.js jaaspeel.ad_url = escape('http://www.yourdomain.com');

- Replace http://www.yourdomain.com with any other url

- Modify the standard images 'small.jpg' and 'large.jpg' with any image editor to your specified needs.

- Upload folder 'peel' to: /httpdocs/

- Paste into <HEAD> of index:

<script src="peel/peel.js" type="text/javascript"></script>

- Done













*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+
		ONLY REQUIRED IF YOU WANT TO CHANGE THE STANDARD NAME OF THE FOLDER
*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+*+

- Open file 'peel/peel.js' with notepad

- Find: 

peel.js jaaspeel.ad_url = escape('http://www.yourdomain.com');

- Replace http://www.yourdomain.com with any other url

- Find:

jaaspeel.small_path = '/peel/small.swf';
jaaspeel.small_image = escape('/peel/small.jpg');

- Replace:

jaaspeel.small_path = '/yourfoldername/small.swf';
jaaspeel.small_image = escape('/yourfoldername/small.jpg');

- Find:

jaaspeel.big_path = '/peel/large.swf';
jaaspeel.big_image = escape('/peel/large.jpg');

- Replace:

jaaspeel.big_path = '/yourfoldername/large.swf';
jaaspeel.big_image = escape('/yourfoldername/large.jpg');

- Modify the standard images 'small.jpg' and 'large.jpg' with any image editor to your specified needs.

- Upload folder 'peel' to: /httpdocs/

- Paste into <HEAD> of index:

<script src="yourfoldername/peel.js" type="text/javascript"></script>

- Done