
function addBtnActionOcr($btn, props, edid) {
    // initialize stuff if required
    // ...
       
    $btn.click(function() {


 var img_text = window.getSelection().toString(); 
  img_text = img_text.replaceAll("{","");
 img_text = img_text.replaceAll("}","");
 img_text = img_text.replaceAll("|","");
 console.log(img_text);       
 Tesseract.recognize(
  "./lib/exe/fetch.php?media="+ img_text,
  'eng',
  { logger: m => console.log(m) }
).then(({ data: { text } }) => {
    atext =  text.replace(/[\r\n]/gm, '');
    atext =  atext.replace(/[^a-z]/gi, ' ')
    var textArea = document.getElementById("wiki__text").value; 
    document.getElementById("wiki__text").value = textArea.replace(img_text,img_text+"|"+ atext);
  alert(text);

});
        

        // your click handler

        return false;
    });
 
    return 'click';
}

