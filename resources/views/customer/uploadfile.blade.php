<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP File Upload</title>
</head>
<body>
    <style>
      .picker-content{
        height:300px;
        width:200px;
      }
    </style>
    <script src="//static.filestackapi.com/filestack-js/2.x.x/filestack.min.js"></script>
    <script type="text/javascript">
      document.addEventListener("DOMContentLoaded", function(event) { 
        const client = filestack.init('AD7bNP33KS2KtLmnyxHXbz'); 

        let options = {
          "displayMode": "inline",
          "container": ".picker-content",
          "accept": [
            "image/jpeg",
            "image/jpg",
            "image/png"
          ],
          "fromSources": [
            "local_file_system"
          ],
          "uploadInBackground": false,
          "onUploadDone": (res) => console.log(res),
        };

        picker = client.picker(options);
        picker.open();
      });
    </script>
    <div class="picker-content"></div>
</body>
</html>