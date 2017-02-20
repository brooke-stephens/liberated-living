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
            var output;
            $.each(data.items, function(i,item){
                // console.log(item)
                videoTitle = item.snippet.title;
                vidId = item.snippet.resourceId.videoId;
                // output = '<li>'+videoTitle+'</li>';
                // output = '<li><iframe src=\"//www.youtube.com/embed/'+vidId+'\">'+videoTitle+'</iframe></li>';
                // output = '<li><iframe src=\"//www.youtube.com/embed/'+vidId+'\"></iframe></li>';
                // output = '<img id=\"'+vidId+'\" src=\"http://img.youtube.com/vi/'+vidId+'/mqdefault.jpg\" alt="" class="vidthumbnail">'
                // output = '<a href=\"sdfasf\" id=\"youtube\" class=\"bb_t4x-iCoM\"><img id=\"'+vidId+'\" src=\"http://img.youtube.com/vi/'+vidId+'/mqdefault.jpg\" alt="" class="vidthumbnail"></a>';
                output = '<a href=\"sdfasf\" id=\"youtube\" class=\"'+vidId+'\"><img src=\"http://img.youtube.com/vi/'+vidId+'/mqdefault.jpg\" class=\"vidthumbnail\"></a>'
                //Append to results list
                $('.imgthumbcontainer').append(output);

            })

          }

    );

}



});