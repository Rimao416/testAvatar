<?php
    $connect=new PDO("mysql:host=localhost;dbname=test","root","");
    $limit = 5;
    $page = 1;
    $page_array[]='';
    if($_POST['page'] > 1)
    {
      $start = (($_POST['page'] - 1) * $limit);
      $page = $_POST['page'];
    }
    else
    {
      $start = 0;
    }
    
    $query = "
    SELECT * FROM tbl_weblesson_post 
    ";
    
    if($_POST['query'] != '')
    {
      $query .= '
      WHERE weblesson_post_title LIKE "%'.str_replace(' ', '%', $_POST['query']).'%" 
      ';
    }
    
    $query .= 'ORDER BY weblesson_post_id ASC ';
    
    $filter_query = $query . 'LIMIT '.$start.', '.$limit.'';
    //Lance la première requete pour vérifier si le mot existe
    $statement = $connect->prepare($query);
    $statement->execute();
    $total_data = $statement->rowCount();
    //Lance une seconde requete pour cette fois, renvoyer les éléments par groupe
    $statement = $connect->prepare($filter_query);
    $statement->execute();
    $result = $statement->fetchAll();
    $total_filter_data = $statement->rowCount();
    //Il affiche ici le nombre des requetes qu'il a réçues
    $output = '
    <label>Total Records - '.$total_data.'</label>
    <table class="table table-striped table-bordered">
      <tr>
        <th>ID</th>
        <th>Post Title</th>
      </tr>
    ';

    if($total_data > 0)
    {
      foreach($result as $row)
      {
        $output .= '
        <tr>
          <td>'.$row["weblesson_post_id"].'</td>
          <td>'.$row["weblesson_post_title"].'</td>
        </tr>
        ';
      }
    }
//En cas de valeur ==0
    else
    {
      $output .= '
      <tr>
        <td colspan="2" align="center">No Data Found</td>
      </tr>
      ';
    }
    
    $output .= '
    </table>
    <br />
    <div align="center">
      <ul class="pagination">
    ';
    
    /*DE CE FAIT, IL PREND LE NOMBRE TOTAL DES LIENS ET LE DIVISE PAR 5*/
    $total_links = ceil($total_data/$limit); //Pour avoir le total des liens
    $previous_link = '';
    $next_link = '';
    $page_link = '';
    
    //echo $total_links;

    print_r($page);
    //Ici c'est le message de sortie de la paggination
    if($total_links > 4)
    {
      if($page < 5)
      {
        for($count = 1; $count <= 5; $count++)
        {
          $page_array[] = $count;
          //Normalement le résultat de sortie, sera [1][2][3][4][5]
        }
        $page_array[] = '...';          //Normalement le résultat de sortie, sera [1][2][3][4][5][...]
        $page_array[] = $total_links;           //Normalement le résultat de sortie, sera [1][2][3][4][5][...][5]
      }
      //Dans le cas où $page!=1
      else
      {
        //Exemple page=28
        
        $end_limit = $total_links - 5;//ep End_limit=23
        if($page > $end_limit)
        {
          $page_array[] = 1;
          $page_array[] = '...';
          for($count = $end_limit; $count <= $total_links; $count++) //Sortie == [1][...][23][24][25][26][27][28]
          {
            $page_array[] = $count;
          }
        }
        else
        {//Dans le cas où page n'est pas égale à Limit exemple, page =16
          $page_array[] = 1;
          $page_array[] = '...';
          for($count = $page - 1; $count <= $page + 1; $count++)
          {
            //Cas de sortie [1][...][15][16]
            $page_array[] = $count;
          }
          $page_array[] = '...';
          $page_array[] = $total_links;            //Cas de sortie [1][...][15][16][...][28]
        }
      }
    }
    //Dans le cas où le total des liens soit inférierieur à 4
    else
    {
      for($count = 1; $count <= $total_links; $count++)
      {
        $page_array[] = $count;
        //Cas de sortie [1][2][3][4]
      }
    }
    //Affichage final
    for($count = 0; $count < count($page_array); $count++)
    {
      if($page == $page_array[$count])
      {
        $page_link .= '
        <li class="page-item active">
          <a class="page-link" href="#">'.$page_array[$count].'<span class="sr-only">(current)</span></a>
        </li>
        ';
        //Mets en blue l'élément actif
    
        $previous_id = $page_array[$count] - 1;
        if($previous_id > 0)
        {
          //DANS LE CAS Où PREVIOUS_ID>0, alors le boutton previous sera possible d'être appyé
          $previous_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$previous_id.'">Previous</a></li>';
        }
        else
        {
          //Dans le cas contraire, il sera desactivé
          $previous_link = '
          <li class="page-item disabled">
            <a class="page-link" href="#">Previous</a>
          </li>
          ';
        }
        //Pareil pour le button Next_id
        $next_id = $page_array[$count] + 1;
        if($next_id >= $total_links)
        {
          $next_link = '
          <li class="page-item disabled">
            <a class="page-link" href="#">Next</a>
          </li>
            ';
        }
        else
        {
          $next_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$next_id.'">Next</a></li>';
        }
      }
      else
      {
        if($page_array[$count] == '...')
        {
          $page_link .= '
          <li class="page-item disabled">
              <a class="page-link" href="#">...</a>
          </li>
          ';
        }
        else
        {
          $page_link .= '
          <li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$page_array[$count].'">'.$page_array[$count].'</a></li>
          ';
        }
      }
    }
    
    $output .= $previous_link . $page_link . $next_link;
    $output .= '
      </ul>
    
    </div>
    ';
    
    echo $output;
    
?>