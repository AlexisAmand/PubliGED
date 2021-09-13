<!-- https://www.startutorial.com/articles/view/how-to-build-a-file-upload-form-using-dropzonejs-and-php -->

<html>
 
<head>
 
<!-- Style de dropzonejs -->
<link href="css/dropzone.css" type="text/css" rel="stylesheet" />
 
</head>
 
<body>
 
<!-- Mise en place de la zone de drop -->

<form action="upload.php" class="dropzone" id="myAwesomeDropzone">
  <div class="fallback">
    <input name="file" type="file" multiple />
  </div>
</form>

<!-- Appel de dropzonejs -->

<script src="js/dropzone.js"></script>

<script>

/* Textes de Dropzonejs en version française */

Dropzone.prototype.defaultOptions.dictDefaultMessage = "Drop files here to upload";
Dropzone.prototype.defaultOptions.dictFallbackMessage = "Your browser does not support drag'n'drop file uploads.";
Dropzone.prototype.defaultOptions.dictFallbackText = "Please use the fallback form below to upload your files like in the olden days.";
Dropzone.prototype.defaultOptions.dictFileTooBig = "File is too gros ({{filesize}}MiB). Max filesize: {{maxFilesize}}MiB.";
Dropzone.prototype.defaultOptions.dictInvalidFileType = "You can't upload files of this type.";
Dropzone.prototype.defaultOptions.dictResponseError = "Server responded with {{statusCode}} code.";
Dropzone.prototype.defaultOptions.dictCancelUpload = "Cancel upload";
Dropzone.prototype.defaultOptions.dictCancelUploadConfirmation = "Are you sure you want to cancel this upload?";
Dropzone.prototype.defaultOptions.dictRemoveFile = "Remove file";
Dropzone.prototype.defaultOptions.dictMaxFilesExceeded = "You can not upload any more files.";

/* configuration de dropzone */

Dropzone.options.myAwesomeDropzone = {
  paramName: "file", // Nom pour le transfert
  acceptedFiles: ".ged",
  maxFilesize: 2, // (en MB)
  maxFiles: 1,
};

</script>

</body>

</html>