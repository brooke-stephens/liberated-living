var channelid = 'UC0e_xJ778Coqbt8P7UTg8CQ';
var vidWidth = 500;
var vidHeight = 400;
var vidResults = 10;

$(document).ready(function(){

  $.get(
      "https://www.googleapis.com/youtube/v3/channels",{
          part:'contentDetails',
          id: channelid,
          key:'AIzaSyBZTOo0A4HfQtU7oOhxLtNSp6ccnczM6wY'},
          function(data){
            $.each(data.items, function(i,item){
                // console.log(item)
                pid = item.contentDetails.relatedPlaylists.uploads;
                getVids(pid);
            })

          }

    );

function getVids(pid){

   $.get(

      "https://www.googleapis.com/youtube/v3/playlistItems",{
          part:'snippet',
          maxResults:vidResults,
          playlistId: pid,
          key:'AIzaSyBZTOo0A4HfQtU7oOhxLtNSp6ccnczM6wY'},
          function(data){
            var thumbnailoutput;
            var counter=0;
            $.each(data.items, function(i,item){
                // console.log(item)
                function getWords(str) {
                    return str.split(/\s+/).slice(0,20).join(" ");
                } 

                videoTitle = item.snippet.title;
                videoTitleShort = getWords(item.snippet.title);
                videoDescription = item.snippet.description;
                vidId = item.snippet.resourceId.videoId;
                counter = counter + 1; 
                // output = '<li>'+videoTitle+'</li>';
                // output = '<li><iframe src=\"//www.youtube.com/embed/'+vidId+'\">'+videoTitle+'</iframe></li>';
                // output = '<li><iframe src=\"//www.youtube.com/embed/'+vidId+'\"></iframe></li>';
                // output = '<img id=\"'+vidId+'\" src=\"http://img.youtube.com/vi/'+vidId+'/mqdefault.jpg\" alt="" class="vidthumbnail">'
                // output = '<a href=\"sdfasf\" id=\"youtube\" class=\"bb_t4x-iCoM\"><img id=\"'+vidId+'\" src=\"http://img.youtube.com/vi/'+vidId+'/mqdefault.jpg\" alt="" class="vidthumbnail"></a>';
                thumbnailoutput = '<div class=\"thumbcontainer\"><div class=\"imgthumbcontainer\"><a href=\"/videos\" id=\"youtube\" class=\"'+vidId+'\" value=\"'+videoTitle+'\" descrition=\"'+videoDescription+'\"><img src=\"http://img.youtube.com/vi/'+vidId+'/mqdefault.jpg\" class=\"vidthumbnail\"></a></div><br><div class=\"thumbdescriptioncontainer\"><span class=\"thumbtitle\">'+videoTitleShort+'</span><br><br><span class=\"subdescription\">LiberatedLiving</span><br></div></div>'
                
                //Append to thumbnail list
                $('.apiresults').append(thumbnailoutput);
               
                //Append to main video descrition list
                  
            })

          }

    );

}

  // this is performing the ajax call
  $(document).on('click', '#youtube',function(event) {
  event.preventDefault();
  
      
  // var id = $("#apiresults").val();    
  var id = $(this).attr('class');
  var title = $(this).attr('value');  
  var des = $(this).attr('descrition');  


  var userinput ='<div class=\"embed-container margin-bottom-15\"><iframe src=\"https://www.youtube.com/embed/'+id+'\?autoplay=1\" frameborder=\"0\" allowfullscreen></iframe></div>';
  var mainoutputdescription ='<h3>'+title+'</h3><br><p><pre>'+des+'</pre></p>';

         $.ajax({
          type: "POST",
          url: 'videos',
         
         // dataType: 'text',
          data: { "test": userinput,"id":id,"title":videoTitle },
            // dataType: "json",
            success: function(data) {
                console.log(data);
                $(".innertopvideo").html(data);
                $(".innerbottomdescription").html(mainoutputdescription);
                
            },
            error: function(data){
                alert("fail");
                console.log(data);
            }
        }); 
     
  }); 


});