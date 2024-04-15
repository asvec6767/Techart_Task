<?php
    include "controller.php";
    function print_news($news_on_page_count){
        $page=(isset($_GET["page"]))?$_GET["page"]:1;//page number

        echo '<h1>Новости</h1><div>';//open news cards container

        //news array
        $news=select_news($page,$news_on_page_count);
        foreach ($news as $new){
            echo '<a href="work_view.php?id='.$new->id.'"><div class="news_content">';//print card and work_news page link 
            echo '<div class="date">' . date_to_string($new->date) . '</div>';//print date div
            echo '<div class="title">' . $new->title . '</div>';//print title div
            echo '<div class="announce">' . $new->announce . '</div>';//print announce div
            echo '<div class="news_a" >ПОДРОБНЕЕ &rarr;</div></div></a>';
        }
        
        echo '</div>';//close news cards container

        //links
        echo '<div class="a_links"><a class="news_a" href="main_view.php?page=1">1</a>';
        echo '<a class="news_a" href="main_view.php?page=2">2</a>';
        echo '<a class="news_a" href="main_view.php?page=3">3</a>';
        if ($page<=intval(db_length()/$news_on_page_count)){
            echo '<a class="news_a" href="main_view.php?page='.($page+1).'">&rarr;</a>';//print next page link 
        }
        echo'</div>';
    }
    
    function print_new(){
        $id=(isset($_GET["id"]))?$_GET["id"]:1;//news id

        //content creating
        $new=new news($id);
        $new->load_data();
        
        echo '<div class="path"><p>Главная&ensp;/&ensp;</p><p>'.$new->title.'</p></div>';
        echo '<h1>' . $new->title . '</h1>';//print title
        echo '<div class="news_detail"><div class="news_detail_content" id="cont"><div class="date">' . date_to_string($new->date) . '</div>';//print date div
        echo '<div class="title">' . $new->announce . '</div>';//print announce div
        echo '<div class="announce">' . $new->content . '</div>';//print content
        echo '<a href="main_view.php" class="news_a">&larr; НАЗАД К НОВОСТЯМ</a></div>';//print back button
        echo '<div id="img"><img src="img/news/' . $new->image . '"></div></div>'; 
    }

    function print_banner(){
        $news=select_news(1,1);
        echo '<div class="banner" style="background-image:url(/Techart_Task/img/news/' . $news[0]->image . ');"> <div class="text">';
        echo '<h1>' . $news[0]->title . '</h1>';
        echo '<h2>' . $news[0]->announce . '</h2>';
        echo '</div> </div>';
    }

?>