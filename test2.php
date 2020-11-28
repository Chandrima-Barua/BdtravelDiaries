<!--<tr><td></td><td class='title'><b style='text-decoration: underline;'>hey</b> has flagged the article '<b>title</b>' posted by <b>postedby</b>as --><?php //if($check_spam && $check_copyright && $check_abusive ){echo '<b>'.' spam,copyrighted and abusive.'.'</b>';} elseif ($check_spam && $check_abusive){ echo  '<b>'.' spam and abusive.'.'</b>';} elseif ($check_abusive && $check_copyright){echo '<b>'.'  abusive and copyrighted.'.'</b>';} elseif ($check_spam && $check_copyright){echo '<b>'.'  spam and copyrighted.'.'</b>';} elseif ($check_copyright){echo '<b>'.'  copyrighted.'.'</b>';} elseif ($check_abusive){echo '<b>'.'  abusive.'.'</b>';} elseif($check_spam){echo '<b>'.'  spam.'.'</b>';} ?><!--</td></tr>-->
<!--<tr><td>date</td><td class='title'><b style='text-decoration: underline;'>hey</b> has flagged the article '<b>title</b>' posted by <b>postedby</b>as spam</td></tr>-->
<!--<h2>BANGLADESH TRAVEL DIARIES</h2><div class='main'>--><?php //foreach ($articles as $key => $value) { ?><!--<div class='all_post' id='art_--><?php //echo $value['articlenumber']?><!--' number='--><?php //echo $value['articlenumber'] ?><!--'><ul><li><span>--><?php //echo $value['articletitle']; ?><!--</span>--><?php //if ( $value['username'] !=   $_SESSION['username']) {?><!--<input type='button' value='Flag' style='float: right' class='flag' id='flag_--><?php //echo $value['articlenumber']?><!--' number='--><?php //echo $value['articlenumber'] ?><!--'><div  class='opt' id='opt_--><?php //echo $value['articlenumber']?><!--' number='--><?php //echo $value['articlenumber'] ?><!--' style='display: none'><ul class='li_op'><li><input type='checkbox' class='abusive' id='abusive_--><?php //echo $value['articlenumber']?><!--' number='--><?php //echo $value['articlenumber'] ?><!--'/>Abusive<span class='close' id='close_--><?php //echo $value['articlenumber']?><!--' number='--><?php //echo $value['articlenumber'] ?><!--'>X</span></li><li><input type='checkbox' class='spam' id='spam_--><?php //echo $value['articlenumber']?><!--' number='--><?php //echo $value['articlenumber'] ?><!--'/>Spam</li><li><input type='checkbox' class='copyrighted' id='copyrighted_--><?php //echo $value['articlenumber']?><!--' number='--><?php //echo $value['articlenumber'] ?><!--'/>Copyrighted<button class='report' id='report_--><?php //echo $value['articlenumber']?><!--' number='--><?php //echo $value['articlenumber'] ?><!--'>Report</button></li></ul></div>--><?php //} ?><!--</li><li class='date'> --><?php //echo $value['username']; ?><!--| --><?php //echo $value['publishtime']; ?><!--</li><br><li class='date'>--><?php //echo $value['articletext']; ?><!--</li></ul</div>--><?php //} ?><!--</div><div class='form'><label style='padding-right: 30px'><b>Post a new Article: </b></label><input type='text' id='title' placeholder='Enter your article title here' name='title'>&nbsp<label  style='padding-left: 20px'><b class='username' session='--><?php //echo $_SESSION['username'] ?><!--' >Signed in as: [--><?php //echo $_SESSION['username'] ?><!--] </b></label><br><br><input type='text' id='art' placeholder='Type your article here' name='article'><button type='submit' id='post'>Post</button></div>-->

<!--<h2>BANGLADESH TRAVEL DIARIES</h2><div class='main'>--><?php //foreach ($articles as $key => $value) { ?><!--<div class='all_post' id='art_--><?php //echo $value['articlenumber']?><!--' number='--><?php //echo $value['articlenumber'] ?><!--'><ul><li><span>--><?php //echo $value['articletitle']; ?><!--</span>--><?php //if ( $value['username'] !=   $_SESSION['username']) {?><!--<input type='button' value='Flag' style='float: right' class='flag' id='flag_--><?php //echo $value['articlenumber']?><!--' number='--><?php //echo $value['articlenumber'] ?><!--'><div  class='opt' id='opt_--><?php //echo $value['articlenumber']?><!--' number='--><?php //echo $value['articlenumber'] ?><!--' style='display: none'><ul class='li_op'><li><input type='checkbox' class='abusive' id='abusive_--><?php //echo $value['articlenumber']?><!--' number='--><?php //echo $value['articlenumber'] ?><!--'/>Abusive<span class='close' id='close_--><?php //echo $value['articlenumber']?><!--' number='--><?php //echo $value['articlenumber'] ?><!--'>X</span></li><li><input type='checkbox' class='spam' id='spam_--><?php //echo $value['articlenumber']?><!--' number='--><?php //echo $value['articlenumber'] ?><!--'/>Spam</li><li><input type='checkbox' class='copyrighted' id='copyrighted_--><?php //echo $value['articlenumber']?><!--' number='--><?php //echo $value['articlenumber'] ?><!--'/>Copyrighted<button class='report' id='report_--><?php //echo $value['articlenumber']?><!--' number='--><?php //echo $value['articlenumber'] ?><!--'>Report</button></li></ul></div>--><?php //} ?><!--</li><li class='date'> --><?php //echo $value['username']; ?><!--| --><?php //echo $value['publishtime']; ?><!--</li><br><li class='date'>--><?php //echo $value['articletext']; ?><!--</li></ul></div>--><?php //} ?><!--</div><div class='form'><label style='padding-right: 30px'><b>Post a new Article: </b></label><input type='text' id='title' placeholder='Enter your article title here' name='title'>&nbsp<label  style='padding-left: 20px'><b class='username' session='--><?php //echo $_SESSION['username'] ?><!--' >Signed in as: [--><?php //echo $_SESSION['username'] ?><!--] </b></label><br><br><input type='text' id='art' placeholder='Type your article here' name='article'><button type='submit' id='post'>Post</button></div>-->


<!--<div class='all_post' id='art_--><?php //echo $value['articlenumber']?><!--' number='--><?php //echo $value['articlenumber'] ?><!--'><ul><li><span>--><?php //echo $value['articletitle']; ?><!--</span><li class='date'> --><?php //echo $value['username']; ?><!--| --><?php //echo $value['publishtime']; ?><!--</li><br><li class='date'>--><?php //echo $value['articletext']; ?><!--</li></ul></div>--><?php //} ?><!--</div><div class='form'><label style='padding-right: 30px'><b>Post a new Article: </b></label><input type='text' id='title' placeholder='Enter your article title here' name='title'>&nbsp<label  style='padding-left: 20px'><b class='username' session=''+name+'' >Signed in as: ['--><?php //echo '<script>document.write(name)</script>' ?><!--'] </b></label><br><br><input type='text' id='art' placeholder='Type your article here' name='article'><button type='submit' id='post'>Post</button></div>-->


<!--<h2>BANGLADESH TRAVEL DIARIES</h2><div class='main'><div class='all_post' id='art_--><?php //echo $value['articlenumber']?><!--' number='--><?php //echo $value['articlenumber'] ?><!--'><ul><li><span>--><?php //echo $value['articletitle']; ?><!--</span><input type='button' value='Flag' style='float: right' class='flag' id='flag_--><?php //echo $value['articlenumber']?><!--' number='--><?php //echo $value['articlenumber'] ?><!--'><div  class='opt' id='opt_--><?php //echo $value['articlenumber']?><!--' number='--><?php //echo $value['articlenumber'] ?><!--' style='display: none'><ul class='li_op'><li><input type='checkbox' class='abusive' id='abusive_--><?php //echo $value['articlenumber']?><!--' number='--><?php //echo $value['articlenumber'] ?><!--'/>Abusive<span class='close' id='close_--><?php //echo $value['articlenumber']?><!--' number='--><?php //echo $value['articlenumber'] ?><!--'>X</span></li><li><input type='checkbox' class='spam' id='spam_--><?php //echo $value['articlenumber']?><!--' number='--><?php //echo $value['articlenumber'] ?><!--'/>Spam</li><li><input type='checkbox' class='copyrighted' id='copyrighted_--><?php //echo $value['articlenumber']?><!--' number='--><?php //echo $value['articlenumber'] ?><!--'/>Copyrighted<button class='report' id='report_--><?php //echo $value['articlenumber']?><!--' number='--><?php //echo $value['articlenumber'] ?><!--'>Report</button></li></ul></div>--><?php //} ?><!--</li><li class='date'> --><?php //echo $value['username']; ?><!--| --><?php //echo $value['publishtime']; ?><!--</li><br><li class='date'>--><?php //echo $value['articletext']; ?><!--</li></ul></div></div><div class='form'><label style='padding-right: 30px'><b>Post a new Article: </b></label><input type='text' id='title' placeholder='Enter your article title here' name='title'>&nbsp<label  style='padding-left: 20px'><b class='username' session=''+name+'' >Signed in as: ['+name+'] </b></label><br><br><input type='text' id='art' placeholder='Type your article here' name='article'><button type='submit' id='post'>Post</button></div>-->


<!--<div class='all_post' id='art_--><?php //echo $value['articlenumber']?><!--' number='--><?php //echo $value['articlenumber'] ?><!--'>-->
<!--                <ul>-->
<!--                    <li><span>--><?php //echo $value['articletitle']; ?><!--</span>-->
<!--                        --><?php //if ( $value['username'] !=   $_SESSION['username'])
//                        {?>
<!--                            <input type='button' value='Flag' style='float: right' class='flag' id='flag_--><?php //echo $value['articlenumber']?><!--' number='--><?php //echo $value['articlenumber'] ?><!--'>-->
<!--                        <div  class='opt' id='opt_--><?php //echo $value['articlenumber']?><!--' number='--><?php //echo $value['articlenumber'] ?><!--' style='display: none'>-->
<!--                            <ul class='li_op'>-->
<!--                                <li>-->
<!--                                    <input type='checkbox' class='abusive unchecked' id='abusive_--><?php //echo $value['articlenumber']?><!--' number='--><?php //echo $value['articlenumber'] ?><!--'/>Abusive-->
<!--                                    <span class='close' id='close_--><?php //echo $value['articlenumber']?><!--' number='--><?php //echo $value['articlenumber'] ?><!--'>X</span>-->
<!--                                    </li>-->
<!--                                <li>-->
<!--                                    <input type='checkbox' class='spam unchecked' id='spam_--><?php //echo $value['articlenumber']?><!--' number='--><?php //echo $value['articlenumber'] ?><!--'/>Spam-->
<!--                                </li>-->
<!--                                <li>-->
<!--                                    <input type='checkbox' class='copyrighted unchecked' id='copyrighted_--><?php //echo $value['articlenumber']?><!--' number='--><?php //echo $value['articlenumber'] ?><!--'/>Copyrighted-->
<!--                                    <button class='report' id='report_--><?php //echo $value['articlenumber']?><!--' number='--><?php //echo $value['articlenumber'] ?><!--'>Report</button>-->
<!--                                </li>-->
<!--                            </ul>-->
<!--                            </div>--><?php //} ?><!--</li>-->
<!--                    <li class='date'> --><?php //echo $value['username']; ?><!--| --><?php //echo $value['publishtime']; ?><!--</li>-->
<!--                    <br>-->
<!--                    <li class='date'>--><?php //echo $value['articletext']; ?><!--</li>-->
<!--                </ul>-->
<!--                </div>--><?php
//            }
//            ?>
<!--        </div>-->
<!--        <div class='form'>-->
<!--            <label style='padding-right: 30px'><b>Post a new Article: </b></label>-->
<!--            <input type='text' id='title' placeholder='Enter your article title here' name='title'>&nbsp-->
<!--            <label  style='padding-left: 20px'>-->
<!--                <b class='username' session='--><?php //echo $_SESSION['username'] ?><!--' >Signed in as: [--><?php //echo $_SESSION['username'] ?><!--] </b>-->
<!--            </label>-->
<!--            <br><br>-->
<!--            <input type='text' id='art' placeholder='Type your article here' name='article'>-->
<!--            <button type='submit' id='post'>Post</button></div>-->
<!--        </div>-->
<!--    </div>-->

<li><input type='checkbox' class='copyrighted unchecked' id='copyrighted_<?php echo $value['articlenumber'] ?>' number='<?php echo $value['articlenumber'] ?>'/>Copyrighted<button class='report' id='report_<?php echo $value['articlenumber'] ?>' number='<?php echo $value['articlenumber'] ?>'>Report</button></li>



//first = "<div class='all_post' id='art_<?php //echo $value['articlenumber']?>//' number='<?php //echo $value['articlenumber'] ?>//'><ul><li><span><?php //echo $value['articletitle']; ?>//</span><input type='button' value='Flag' style='float: right' class='flag' id='flag_<?php //echo $value['articlenumber']?>//' number='<?php //echo $value['articlenumber'] ?>//'><div  class='opt' id='opt_<?php //echo $value['articlenumber']?>//' number='<?php //echo $value['articlenumber'] ?>//' style='display: none'><ul class='li_op'>" ;
                    <?php //   if($abusive === false){  ?>
                    //abusive_checked = "<li><input type='checkbox' class='abusive checked' id='abusive_<?php //echo $value['articlenumber'] ?>//' number='<?php //echo $value['articlenumber'] ?>//'/>Abusive<span class='close' id='close_<?php //echo $value['articlenumber'] ?>//' number='<?php //echo $value['articlenumber'] ?>//'>X</span><span style='display: none' id='abs_<?php //echo $value['articlenumber']?>//'></span></li>";
                    //
                    //
                    <?php //}
                    //else{
                    //
                    //?>
                    //abusive_unchecked = "<li><input type='checkbox' class='abusive unchecked' id='abusive_<?php //echo $value['articlenumber'] ?>//' number='<?php //echo $value['articlenumber'] ?>//'/>Abusive<span class='close' id='close_<?php //echo $value['articlenumber'] ?>//' number='<?php //echo $value['articlenumber'] ?>//'>X</span></li>";
                    //
                    //
                    <?php
                    //
                    //    }
                    //if($spam === false){
                    //
                    //?>
                    // spam_checked = "<li><input type='checkbox' class='spam checked' id='spam_<?php //echo $value['articlenumber']?>//' number='<?php //echo $value['articlenumber'] ?>//'/>Spam</li>";
                    //
                    //
                    //
                    <?php
                    //    }
                    //else{
                    //?>
                    //spam_unchecked = "<li><input type='checkbox' class='spam unchecked' id='spam_<?php //echo $value['articlenumber']?>//' number='<?php //echo $value['articlenumber'] ?>//'/>Spam</li>";
                    //
                    //
                    <?php
                    //    }
                    //if($copyright === false) {
                    //?>
                    //copy_checked= "<li><input type='checkbox' class='copyrighted checked' id='copyrighted_<?php //echo $value['articlenumber'] ?>//' number='<?php //echo $value['articlenumber'] ?>//'/>Copyrighted<button class='report' id='report_<?php //echo $value['articlenumber'] ?>//' number='<?php //echo $value['articlenumber'] ?>//'>Report</button></li>";
                    //
                    //
                    <?php
                    //    }
                    //else{
                    //?>
                    //
                    //copy_unchecked = "<li><input type='checkbox' class='copyrighted unchecked' id='copyrighted_<?php //echo $value['articlenumber'] ?>//' number='<?php //echo $value['articlenumber'] ?>//'/>Copyrighted<button class='report' id='report_<?php //echo $value['articlenumber'] ?>//' number='<?php //echo $value['articlenumber'] ?>//'>Report</button></li>";
                    //
                    //
                    <?php
                    //    }
                    //?>
                    //
                    //  last = "</ul></div></li><li class='date'> <?php //echo $value['username']; ?>//| <?php //echo $value['publishtime']; ?>//</li><br><li class='date'><?php //echo $value['articletext']; ?>//</li></ul></div>";




//strings = "<div class='all_post' id='art_<?php //echo $value['articlenumber']?>//' number='<?php //echo $value['articlenumber'] ?>//'><ul><li><span><?php //echo $value['articletitle']; ?>//</span><input type='button' value='Flag' style='float: right' class='flag' id='flag_<?php //echo $value['articlenumber']?>//' number='<?php //echo $value['articlenumber'] ?>//'><div  class='opt' id='opt_<?php //echo $value['articlenumber']?>//' number='<?php //echo $value['articlenumber'] ?>//' style='display: none'><ul class='li_op'><li><input type='checkbox' class='abusive unchecked' id='abusive_<?php //echo $value['articlenumber']?>//' number='<?php //echo $value['articlenumber'] ?>//'/>Abusive<span class='close' id='close_<?php //echo $value['articlenumber']?>//' number='<?php //echo $value['articlenumber'] ?>//'>X</span><span style='display: none' id='abs_<?php //echo $value['articlenumber']?>//'>" + abusive + "</span></li><li><input type='checkbox' class='spam unchecked' id='spam_<?php //echo $value['articlenumber']?>//' number='<?php //echo $value['articlenumber'] ?>//'/>Spam<span style='display: none' id='sp_<?php //echo $value['articlenumber']?>//'>" + spam + "</span></li><li><input type='checkbox' class='copyrighted unchecked' id='copyrighted_<?php //echo $value['articlenumber']?>//' number='<?php //echo $value['articlenumber'] ?>//'/>Copyrighted<span style='display: none' id='copy_<?php //echo $value['articlenumber']?>//'>" + copyrighted + "</span><button class='report' id='report_<?php //echo $value['articlenumber']?>//' number='<?php //echo $value['articlenumber'] ?>//'>Report</button></li></ul></div></li><li class='date'> <?php //echo $value['username']; ?>//| <?php //echo $value['publishtime']; ?>//</li><br><li class='date'><?php //echo $value['articletext']; ?>//</li></ul></div>";
//
