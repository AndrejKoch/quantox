<?php namespace app\core; ?>
<div class="container">
    <div class="row mt-4">

        <div class="col-4">
            <?php

            use app\models\Category;

            function getUsersCount($id, $users)
            {
                if ($users != NULL && count($users) > 0) {
                    $count = 0;
                    foreach ($users as $user) {
                        if($user['category_id'] == $id) {
                            $count += 1;
                        }
                    }
                    return $count;
                } else {
                    return 0;
                }
            }

            $cats = \app\models\Category::getCategories();
            echo '<label><h4>Categories</h4></label>';
            echo '<br/>';
            echo '<ul class="mt-4">';
            $space = "&nbsp;&nbsp;";
            foreach ($cats as $cat) {
                if ($cat['parent_id'] == 0) {
                    echo "<li value='" . $cat['id'] . "'>" . $cat['name'] . "(". getUsersCount($cat['id'],$params) .")". "</li>";
                    foreach ($cats as $ca) {
                        if ($ca['parent_id'] == $cat['id']) {
                            echo "<li value='" . $ca['id'] . "'>" . $space . $ca['name'] . "(". getUsersCount($ca['id'],$params) .")". "</li>";
                            foreach ($cats as $c) {
                                if ($c['parent_id'] == $ca['id']) {
                                    echo "<li value='" . $c['id'] . "'>" . $space . $space . $c['name'] . "(". getUsersCount($c['id'],$params) .")"."</li>";
                                    foreach ($cats as $z) {
                                        if ($z['parent_id'] == $c['id']) {
                                            echo "<li value='" . $z['id'] . "'>" . $space. $space . $space . $z['name'] . "(". getUsersCount($z['id'],$params) .")"."</li>";
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
            echo '</ul>';
            ?>
        </div>


        <div class="col-8">


            <?php if ($params != NULL && count($params) > 0) {
                echo "<table class='table mt-4'>";
                echo "<thead class='thead-dark'>";
                echo "<tr>";
                echo "<th>Firstname</th>";
                echo "<th>Lastname</th>";
                echo "<th>Email</th>";
                echo "<th>Category</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                foreach ($params as $param) {
                    echo "<tr>";
                    echo "<td>" . $param['firstname'] . "</td>";
                    echo "<td>" . $param['lastname'] . "</td>";
                    echo "<td>" . $param['email'] . "</td>";
                    echo "<td>" . $param['category_name'] . "</td>";
                    echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";
            } else {
                echo "<h4>No results found.</h4>";
            } ?>
        </div>
    </div>
