<?php

/*	Class Function for ADMIN MANAGEMENT	*/

/**
 * AdminManagement
 * 
 * @package   
 * @author 
 * @copyright gencyolcu
 * @version 2014
 * @access public
 */
class AdminManagement extends Site
{
    #--------------------------------------------------------------------------------
    #Main Category Management
    #--------------------------------------------------------------------------------
    /**
     * AdminManagement::mainCategoryAdd()
     * 
     * @return
     */
    function mainCategoryAdd()
    {
        global $CFG;

        $category_name = $this->filterInput($_POST['new_catename']);
        $restaurant_name = $this->filterInput($_POST['restaurant_name']);
		
		//Categorias unicas para todos los rest
		$restaurant_name = 0;
        $noofrows = $this->getNumvalues($CFG['table']['category_main'], "maincatename='" .
            $category_name . "' AND restaurant_id = '" . $restaurant_name . "'");
        if ($noofrows > 0)
        {
            echo "exist";
        }
    }
    #---------------------------------------------------------------------------------
    #Add Category
    /**
     * AdminManagement::categoryAdd()
     * 
     * @return
     */
    function categoryAdd()
    {
        global $CFG, $admin_smarty, $objThumb;

        $category_name = $this->filterInput($_POST['maincatename']);
        $category_seoname = $this->seoUrl($_POST["maincatename"]);
        $cateoption = $this->filterInput($_POST['maincat_option']);

        if (isset($_REQUEST['restaurant_name']) && !empty($_REQUEST['restaurant_name']))
        {
            $restaurant_name = $this->filterInput($_POST['restaurant_name']);
        }
        if (isset($_REQUEST['resid']) && !empty($_REQUEST['resid']))
        {
            $restaurant_name = $this->filterInput($_REQUEST['resid']);
        }

        $query = "INSERT INTO " . $CFG['table']['category_main'] .
            " SET maincatename = '" . $category_name . "', maincat_seourl = '" . $category_seoname .
            "',restaurant_id = '" . $restaurant_name . "',  maincat_option = '" . $cateoption .
            "', addeddate = '" . CUR_TIME . "'";
        $res_cat = $this->ExecuteQuery($query, "insert");

        
        if (isset($_GET['resid']) && !empty($_GET['resid']))
        {
            $this->redirectUrl("categoryManage.php?resid=$_GET[resid]");
        } else
        {
            $this->redirectUrl("categoryManage.php");
        }
    }
    #--------------------------------------------------------------------------------
    #Main Category EDIT
    /**
     * AdminManagement::mainCategoryEdit()
     * 
     * @return
     */
    function mainCategoryEdit()
    {
        global $CFG;
        #echo "<pre>";print_r($_POST);echo "</pre>";

        $catname = $this->filterInput($_POST['catename']);
        $restaurant_name = $this->filterInput($_POST['restaurant_name']);
        //$seourl  = $this->seoUrl($_POST['catname']);
        
        //Categoria unica
        $restaurant_name = 0;
        
        $noforows = $this->getNumvalues($CFG['table']['category_main'],
            "maincatename = '" . $catname . "' AND restaurant_id = '" . $restaurant_name .
            "' AND maincateid != '" . $this->filterInput($_POST['eid']) . "'");
        #echo "noof rows: =>=> ".$noforows;
        if ($noforows != 0)
        {
            echo "exist";
        }
        
    }
    #--------------------------------------------------------------------------
    #Edit Category
    /**
     * AdminManagement::categoryEdit()
     * 
     * @param mixed $cid
     * @return
     */
    function categoryEdit($cid)
    {
        global $CFG, $admin_smarty, $objThumb;

        $category_name = $this->filterInput($_POST['maincatename']);
        $category_seoname = $this->seoUrl($_POST["maincatename"]);
        $cateoption = $this->filterInput($_POST['maincat_option']);
        $maincat_desc = $this->filterInput($_POST['maincat_desc']);

        if (isset($_REQUEST['restaurant_name']) && !empty($_REQUEST['restaurant_name']))
        {
            $restaurant_name = $this->filterInput($_POST['restaurant_name']);
        }
        if (isset($_REQUEST['resid']) && !empty($_REQUEST['resid']))
        {
            $restaurant_name = $this->filterInput($_REQUEST['resid']);
        }

        $query_upd = "UPDATE " . $CFG['table']['category_main'] .
            " SET maincatename = '" . $category_name . "', maincat_seourl = '" . $category_seoname .
            "', maincat_option = '" . $cateoption . "', restaurant_id = '" . $restaurant_name .
            "' WHERE maincateid = '" . $cid . "' ";
        $res_cat = $this->ExecuteQuery($query_upd, "update");
        
        if (isset($_GET['resid']) && !empty($_GET['resid']))
        {
            $this->redirectUrl("categoryManage.php?resid=$_GET[resid]");
        } else
        {
            $this->redirectUrl("categoryManage.php");
        }
    }
    #--------------------------------------------------------------------------------
    #Main Category List
    /**
     * AdminManagement::mainCategoryList()
     * 
     * @return
     */
    function mainCategoryList()
    {
        global $CFG, $admin_smarty;

        $req_keyword        = $this->filterInput($_REQUEST['keyword']);
        $searchrestaurantid = $this->filterInput($_REQUEST['searchrestaurantid']);
        $resid              = $this->filterInput($_GET['resid']);
        
        #sort order
        if (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'casc')
        {
            $sort = " ORDER BY maincatename ASC";
            $fields .= "&sortby=casc";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'cdesc')
        {
            $sort = " ORDER BY maincatename DESC";
            $fields .= "&sortby=cdesc";
        } else
        {
            //$sort = " ORDER BY maincatename ASC";
            $sort = "ORDER BY sortorder ASC";
        }

        #Status
        if (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'active')
        {
            $condition .= " AND status = '1' ";
            $fields .= "&sortby=active";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'deactive')
        {
            $condition .= " AND status = '0' ";
            $fields .= "&sortby=deactive";
        }

        if (isset($_REQUEST['limit']) && !empty($_REQUEST['limit']) && ($_REQUEST['limit'] !=
            "all"))
        {
            $limit = $_REQUEST['limit'];
            $fields .= "&limit=$_REQUEST[limit]";
        } else
        {
            $limit = PAGELIMIT;
            //$limit = 500;
        }

        $page = $_REQUEST['page'];
        if ($page == 0)
            $page = 1;
        if ($page)
            $start = ($page - 1) * $limit;
        else
            $start = 0;

        if (!empty($_REQUEST['limit']) && ($_REQUEST['limit'] == "all"))
        {
            $sql_lim = $_REQUEST['limit'];
        } else
        {
            $sql_lim = "$start, $limit";
        }

        #Keyword
        //echo "<pre>";print_r($req_keyword);echo "</pre>";
        if (isset($req_keyword) && !empty($req_keyword))
        {
            $keyword = "&keyword=$_REQUEST[keyword]";
            $condition .= "AND maincatename LIKE '%" . addslashes($req_keyword) .
                "%' ";
            $fields .= "&keyword=$_REQUEST[keyword]";
        }
        //echo "<pre>";print_r($_REQUEST['resid']);echo "</pre>";
        if (isset($_REQUEST['resid']) && !empty($_REQUEST['resid']))
        {
            $fields .= "&resid=$_REQUEST[resid]";
        }
        //echo "<pre>";print_r($resid);echo "</pre>";
        if (isset($resid) && !empty($resid))
        {
            $rest_cond .= " AND cat.restaurant_id = '" . $resid . "' ";
            $rest_cond1 .= " AND restaurant_id = '" . $resid . "' ";

            $restname = $this->getValue('restaurant_name', $CFG['table']['restaurant'],
                "restaurant_id = '" . $resid . "'");
            $admin_smarty->assign("restname", $restname);
        }

        if (isset($searchrestaurantid) && !empty($searchrestaurantid))
        {
            $condition .= " AND res.restaurant_id = '" . $searchrestaurantid .
                "' ";
            $rest_cond1 .= " AND restaurant_id = '" . $searchrestaurantid . "' ";
            $fields .= "&searchrestaurantid=$_REQUEST[searchrestaurantid]";
        }

        #$sql_sel = "SELECT maincateid, maincatename, sortorder, status, addeddate FROM ".$CFG['table']['category_main']." WHERE parent_id = '0' AND maincateid IS NOT NULL $condition $sort";
        $sql_sel = "SELECT cat.maincatename, cat.maincateid, cat.sortorder, cat.status, cat.addeddate " .
            " FROM " . $CFG['table']['category_main'] ." AS cat ".
            " WHERE cat.delete_status = 'No' AND cat.restaurant_id = '0'  AND maincateid IS NOT NULL " . " " . $sort .
            " ";
        
        /*
        $sql_sel = "SELECT cat.maincatename, cat.maincateid, cat.sortorder, cat.status, cat.addeddate, cat.restaurant_id, " .
            " res.restaurant_name AS cat_restname, res.restaurant_id " . " FROM " . $CFG['table']['category_main'] .
            " AS cat " . " LEFT JOIN " . $CFG['table']['restaurant'] .
            " AS res ON cat.restaurant_id = res.restaurant_id " .
            " WHERE cat.delete_status = 'No'AND res.delete_status = 'No'  AND maincateid IS NOT NULL " . $rest_cond . " " . $condition . " " . $sort .
            " ";
            */
        $total_pages = $this->ExecuteQuery($sql_sel, 'norows');

        $targetpage = "categoryManage.php";
        $next_page = $this->make_page($targetpage, $total_pages, $limit, $page, $fields);
        $sql_limit = $sql_sel . " LIMIT " . $sql_lim;

        $result = mysqli_query($this->DBCONN,$sql_limit) or die(mysqli_error($this->DBCONN));
        $cnt = 1;
        while ($row_seller = mysqli_fetch_array($result))
        {
            $row_seller['sno'] = (($page - 1) * $limit) + $cnt;
            $row_seller['addeddate'] = $this->setDateFormatWithOutTime($row_seller['addeddate']);
            $categoryList[] = $row_seller;
            $cnt++;
        }
        
        //echo "<pre>";print_r($categoryList);echo "</pre>";
        #From & To Records
        if ($page == 1)
        {
            $fromRecords = 1;
            $toRecords = $limit;
            if ($toRecords >= $total_pages)
                $toRecords = $total_pages;
        } else
        {
            $fromRecords = $start + 1;
            $toRecords = $start + $limit;
            if ($toRecords >= $total_pages)
                $toRecords = $total_pages;
        }

        if (isset($_REQUEST['searchrestaurantid']) && !empty($_REQUEST['searchrestaurantid']))
        {
            $filename = 'categoryManage.php?searchrestaurantid=' . $_REQUEST['searchrestaurantid'] . '';
        } else
        {
            $filename = 'categoryManage.php';
        }
        #echo "filename ".$filename;
        $admin_smarty->assign("tablename", $CFG['table']['category_main']);
        $admin_smarty->assign("whereField", 'maincateid');
        $admin_smarty->assign("fieldname", 'status');
        $admin_smarty->assign("word", 'Main Category');
        $admin_smarty->assign("restid",$categoryList[0]['restaurant_id']);
        $admin_smarty->assign("filename", $filename);
        $admin_smarty->assign("page", $page);

        $admin_smarty->assign("totalRecords", $total_pages);
        $admin_smarty->assign("fromRecords", $fromRecords);
        $admin_smarty->assign("toRecords", $toRecords);
        $admin_smarty->assign("limit", $limit);

        $admin_smarty->assign("mainCategory_list", $categoryList);
        $admin_smarty->assign("pagination", $next_page);
    }
    #--------------------------------------------------------------------------------
    #Main Category List
    /**
     * AdminManagement::mainCategoryList()
     * 
     * @return
     */
    function mainCategoryDeletedList()
    {
        global $CFG, $admin_smarty;

        $req_keyword        = $this->filterInput($_REQUEST['keyword']);
        $searchrestaurantid = $this->filterInput($_REQUEST['searchrestaurantid']);
        $resid              = $this->filterInput($_GET['resid']);

        #sort order
        if (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'casc')
        {
            $sort = " ORDER BY maincatename ASC";
            $fields .= "&sortby=casc";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'cdesc')
        {
            $sort = " ORDER BY maincatename DESC";
            $fields .= "&sortby=cdesc";
        } else
        {
            //$sort = " ORDER BY maincatename ASC";
            $sort = "ORDER BY sortorder ASC";
        }

        #Status
        if (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'active')
        {
            $condition .= " AND status = '1' ";
            $fields .= "&sortby=active";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'deactive')
        {
            $condition .= " AND status = '0' ";
            $fields .= "&sortby=deactive";
        }

        if (isset($_REQUEST['limit']) && !empty($_REQUEST['limit']) && ($_REQUEST['limit'] !=
            "all"))
        {
            $limit = $_REQUEST['limit'];
            $fields .= "&limit=$_REQUEST[limit]";
        } else
        {
            $limit = PAGELIMIT;
            //$limit = 500;
        }

        $page = $_REQUEST['page'];
        if ($page == 0)
            $page = 1;
        if ($page)
            $start = ($page - 1) * $limit;
        else
            $start = 0;

        if (!empty($_REQUEST['limit']) && ($_REQUEST['limit'] == "all"))
        {
            $sql_lim = $_REQUEST['limit'];
        } else
        {
            $sql_lim = "$start, $limit";
        }

        #Keyword
        //echo "<pre>";print_r($req_keyword);echo "</pre>";
        if (isset($req_keyword) && !empty($req_keyword))
        {
            $keyword = "&keyword=$_REQUEST[keyword]";
            $condition .= "AND maincatename LIKE '%" . addslashes($req_keyword) .
                "%' ";
            $fields .= "&keyword=$_REQUEST[keyword]";
        }
        //echo "<pre>";print_r($_REQUEST['resid']);echo "</pre>";
        if (isset($_REQUEST['resid']) && !empty($_REQUEST['resid']))
        {
            $fields .= "&resid=$_REQUEST[resid]";
        }
        //echo "<pre>";print_r($resid);echo "</pre>";
        if (isset($resid) && !empty($resid))
        {
            $rest_cond .= " AND cat.restaurant_id = '" . $resid . "' ";
            $rest_cond1 .= " AND restaurant_id = '" . $resid . "' ";

            $restname = $this->getValue('restaurant_name', $CFG['table']['restaurant'],
                "restaurant_id = '" . $resid . "'");
            $admin_smarty->assign("restname", $restname);
        }

        if (isset($searchrestaurantid) && !empty($searchrestaurantid))
        {
            $condition .= " AND res.restaurant_id = '" . $searchrestaurantid .
                "' ";
            $rest_cond1 .= " AND restaurant_id = '" . $searchrestaurantid . "' ";
            $fields .= "&searchrestaurantid=$_REQUEST[searchrestaurantid]";
        }

        #$sql_sel = "SELECT maincateid, maincatename, sortorder, status, addeddate FROM ".$CFG['table']['category_main']." WHERE parent_id = '0' AND maincateid IS NOT NULL $condition $sort";
        $sql_sel = "SELECT cat.maincatename, cat.maincateid, cat.sortorder, cat.status, cat.addeddate, cat.restaurant_id, " .
            " res.restaurant_name AS cat_restname, res.restaurant_id " . " FROM " . $CFG['table']['category_main'] .
            " AS cat " . " LEFT JOIN " . $CFG['table']['restaurant'] .
            " AS res ON cat.restaurant_id = res.restaurant_id " .
            " WHERE cat.delete_status = 'Yes' AND maincateid IS NOT NULL " . $rest_cond . " " . $condition . " " . $sort .
            " ";
        $total_pages = $this->ExecuteQuery($sql_sel, 'norows');

        $targetpage = "categoryDeleteManage.php";
        $next_page = $this->make_page($targetpage, $total_pages, $limit, $page, $fields);
        $sql_limit = $sql_sel . " LIMIT " . $sql_lim;

        $result = mysqli_query($this->DBCONN,$sql_limit) or die(mysqli_error($this->DBCONN));
        $cnt = 1;
        while ($row_seller = mysqli_fetch_array($result))
        {
            $row_seller['sno'] = (($page - 1) * $limit) + $cnt;
            $categoryList[] = $row_seller;
            $cnt++;
        }
        
        //echo "<pre>";print_r($categoryList);echo "</pre>";
        #From & To Records
        if ($page == 1)
        {
            $fromRecords = 1;
            $toRecords = $limit;
            if ($toRecords >= $total_pages)
                $toRecords = $total_pages;
        } else
        {
            $fromRecords = $start + 1;
            $toRecords = $start + $limit;
            if ($toRecords >= $total_pages)
                $toRecords = $total_pages;
        }

        if (isset($_REQUEST['searchrestaurantid']) && !empty($_REQUEST['searchrestaurantid']))
        {
            $filename = 'categoryDeleteManage.php?searchrestaurantid=' . $_REQUEST['searchrestaurantid'] . '';
        } else
        {
            $filename = 'categoryDeleteManage.php';
        }
        #echo "filename ".$filename;
        $admin_smarty->assign("tablename", $CFG['table']['category_main']);
        $admin_smarty->assign("whereField", 'maincateid');
        $admin_smarty->assign("fieldname", 'status');
        $admin_smarty->assign("word", 'Main Category');
        $admin_smarty->assign("restid",$categoryList[0]['restaurant_id']);
        $admin_smarty->assign("filename", $filename);
        $admin_smarty->assign("page", $page);

        $admin_smarty->assign("totalRecords", $total_pages);
        $admin_smarty->assign("fromRecords", $fromRecords);
        $admin_smarty->assign("toRecords", $toRecords);
        $admin_smarty->assign("limit", $limit);

        $admin_smarty->assign("mainCategory_list", $categoryList);
        $admin_smarty->assign("pagination", $next_page);
    }
    #--------------------------------------------------------------------------------
    #Export Main Category
    /**
     * AdminManagement::exportMainCategory()
     * 
     * @return
     */
    function exportMainCategory()
    {
        global $CFG;

        $restaurant_cond = '';
        if (isset($_GET['resid']) && !empty($_GET['resid']))
        {
            $restaurant_cond = " AND restaurant_id = '" . $_GET['resid'] . "'  ";
            $file_name = "Category_" . $_GET['resid'];
        } else
        {
            $file_name = "Category_" . date("dmY-His");
        }

        #File name
        #$file_name 		= "Category_".date("dmY-His");
        //$export_val_arr = array('maincateid', 'maincatename');
        $export_val_arr = array('maincatename');
        #Table
        //$selectfld 		= "maincateid, maincatename";
        $selectfld = "maincatename";
        $tablename = $CFG['table']['category_main'];
        $tblcondition = "maincateid IS NOT NULl AND status = '1'  " . $restaurant_cond .
            " ORDER BY maincatename ASC";
        $table_arr = array(
            $selectfld,
            $tablename,
            $tblcondition);

        #CSV
        //$csv_heading_arr = array("Category Id","Category Name");
        $csv_heading_arr = array("Category Name");

        #Xls
        //$xls_heading_arr = "Category Id\tCategory Name";
        $xls_heading_arr = "Category Name";

        $this->exportProcessCSVXLS($file_name, $table_arr, $export_val_arr, $csv_heading_arr,
            $xls_heading_arr);
    }
    #--------------------------------------------------------------------------------
    #Import Main Category
    /**
     * AdminManagement::importMainCategory()
     * 
     * @return
     */
    function importMainCategory()
    {
        global $CFG;

        $tablename = $CFG['table']['category_main'];
        $dbfields = array("maincatename");
        $filename = "categoryManage.php";

        $this->importProcessCSV($tablename, $dbfields, $filename);
    }
     #--------------------------------------------------------------------------------
    #  Followers Management
    #--------------------------------------------------------------------------------
    #Add new Followers name
    /**
     * AdminManagement::checkFollowersName()
     * 
     * @return
     */
    function checkFollowersName() {
        
         global $CFG, $admin_smarty, $objThumb;

        $followers_name = $this->filterInput($_POST["followers_name"]);
        $followers_url = $this->filterInput($_POST["followers_url"]);
        
        $noofrows = $this->getNumvalues($CFG['table']['followers'], "followers_name='" .
            $followers_name . "'");
        if ($noofrows > 0)
        {
            echo "exist";
        }
        
    }
    #--------------------------------------------------------------------------------
    #  Followers Management
    #--------------------------------------------------------------------------------
    #Add new Followers name
    /**
     * AdminManagement::newFollowersAdd()
     * 
     * @return
     */
    function newFollowersAdd()
    {
        global $CFG, $admin_smarty, $objThumb;

        $followers_name = $this->filterInput($_POST["followers_name"]);
        $followers_url = $this->filterInput($_POST["followers_url"]);
        
        $noofrows = $this->getNumvalues($CFG['table']['followers'], "followers_name='" .
            $followers_name . "'");
        if ($noofrows > 0)
        {
            echo "exist";
        }
        
        $query = "INSERT INTO " . $CFG['table']['followers'] . " SET followers_name = '" .
            $followers_name . "', followers_url = '" . $followers_url . "', addeddate = '" .
            CUR_TIME . "'";
        $LastInsertedId = $this->ExecuteQuery($query, "insert");
        
        $imagesizedata = getimagesize($_FILES['followers_logo']['tmp_name']);
        if (isset($_FILES['followers_logo']['name']) && !empty($_FILES['followers_logo']['name']) && $imagesizedata == TRUE)
        {
            $logoext   = $this->getFileExtension($_FILES['followers_logo']['name']);
            $logoname  = $this->seoUrl($_POST["followers_name"]) . "." . $logoext;
            $logoimage = "photo_" . $logoname;
            $dest_name = $CFG['site']['photo_followers_path'] . '/' . $logoimage;

            $uploadsuccess = @move_uploaded_file($_FILES['followers_logo']['tmp_name'], $dest_name);
            @chmod($dest_name, 0777);
            if ($uploadsuccess)
            {
                $photo = "photo_" . $logoname;
                #Get Thumbnail width & height
                $followersthumb = $this->iconSettingValues();
                list($width_org, $height_org) = getimagesize($dest_name);

                if (($width_org > $followersthumb['0']['follower_icon_width']) || ($height_org >
                    $followersthumb['0']['follower_icon_height']))
                {
                    #Create Thumbnail
                    $sour_imagepath = $dest_name;
                    $dest_imagepath = $CFG['site']['photo_followers_path'] . '/' . $photo;
                    $objThumb->createThumb($sour_imagepath, $dest_imagepath, $followersthumb['0']['follower_icon_width'],
                        $followersthumb['0']['follower_icon_height'], 'exact');
                }
                #@unlink($dest_name);
                $query = "UPDATE " . $CFG['table']['followers'] . " SET followers_logo = '" . $photo .
                    "' WHERE followers_id = '" . $LastInsertedId . "' ";
                $res = $this->ExecuteQuery($query, "update");
            }
        }
        $this->redirectUrl("followersManage.php");
    }
    #--------------------------------------------------------------------------------
    #Edit Followers Name
    /**
     * AdminManagement::editFollowersName()
     * 
     * @return
     */
    function editFollowersName()
    {
        global $CFG, $admin_smarty, $objThumb;

        $followers_name = $this->filterInput($_POST["followers_name"]);
        $followers_url  = $this->filterInput($_POST["followers_url"]);
        $cusid          = $this->filterInput($_GET['cusid']);

        $UpQuery = "UPDATE " . $CFG['table']['followers'] . " SET followers_name = '" .
            $followers_name . "', followers_url = '" . $followers_url .
            "' WHERE followers_id  = '" . $cusid . "' ";
        $UpResult = $this->ExecuteQuery($UpQuery, 'update');
        
        $imagesizedata = getimagesize($_FILES['followers_logo']['tmp_name']); 
        if (isset($_FILES['followers_logo']['name']) && !empty($_FILES['followers_logo']['name']) && $imagesizedata == TRUE)
        {
            $getphotoname = $this->getValue("followers_logo", $CFG['table']['followers'],
                "followers_id = '" . $cusid . "' ");
            if (!empty($getphotoname))
            {
                @unlink($CFG['site']['photo_followers_path'] . '/' . $getphotoname);
            }
            $logoext = $this->getFileExtension($_FILES['followers_logo']['name']);
            $logoname = $this->seoUrl($_POST["followers_name"]).time()."." . $logoext;
            $logoimage = "photo_" . $logoname;
            $dest_name = $CFG['site']['photo_followers_path'] . '/' . $logoimage;

            $uploadsuccess = @move_uploaded_file($_FILES['followers_logo']['tmp_name'], $dest_name);
            @chmod($dest_name, 0777);
            if ($uploadsuccess)
            {
                $photo = "photo_" . $logoname;
                #Get Thumbnail width & height
                $followersthumb = $this->iconSettingValues();

                list($width_org, $height_org) = getimagesize($dest_name);

                if (($width_org > $followersthumb['0']['follower_icon_width']) || ($height_org >
                    $followersthumb['0']['follower_icon_height']))
                {
                    #Create Thumbnail
                    $sour_imagepath = $dest_name;
                    $dest_imagepath = $CFG['site']['photo_followers_path'] . '/' . $photo;
                    $objThumb->createThumb($sour_imagepath, $dest_imagepath, $followersthumb['0']['follower_icon_width'],
                        $followersthumb['0']['follower_icon_height'], 'exact');
                }
                $query = "UPDATE " . $CFG['table']['followers'] . " SET followers_logo = '" . $photo .
                    "' WHERE followers_id = '" . $cusid . "' ";
                $res = $this->ExecuteQuery($query, "update");
            }
        }
        $this->redirectUrl("followersManage.php");
    }
    #--------------------------------------------------------------------------------
    #Folowers List manage
    /**
     * AdminManagement::followersList()
     * 
     * @return
     */
    function followersList()
    {
        global $CFG, $admin_smarty;

        $req_keyword        = $this->filterInput($_REQUEST['keyword']);
        

        if (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'casc')
        {
            $sort = " ORDER BY followers_name ASC";
            $fields .= "&sortby=casc";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'cdesc')
        {
            $sort = " ORDER BY followers_name DESC";
            $fields .= "&sortby=cdesc";
        } else
        {
            $sort .= " ORDER BY followers_name ASC";
        }

        #Status
        if (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'active')
        {
            $condition .= " AND followers_status = '1' ";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'deactive')
        {
            $condition .= " AND followers_status = '0' ";
        }

        if (isset($_REQUEST['limit']) && !empty($_REQUEST['limit']) && ($_REQUEST['limit'] !=
            "all"))
        {
            $limit = $this->filterInput($_REQUEST['limit']);
            $fields = "&limit=$_REQUEST[limit]";
        } else
        {
            $limit = PAGELIMIT;
        }

        $page = $this->filterInput($_REQUEST['page']);
        if ($page == 0)
            $page = 1;
        if ($page)
            $start = ($page - 1) * $limit;
        else
            $start = 0;

        if (!empty($_REQUEST['limit']) && ($_REQUEST['limit'] == "all"))
        {
            $sql_lim = $this->filterInput($_REQUEST['limit']);
        } else
        {
            $sql_lim = "$start, $limit";
        }

        #Keyword
        if (isset($req_keyword) && !empty($req_keyword))
        {
            $keyword = "&keyword=$_REQUEST[keyword]";
            $condition .= "AND followers_name LIKE '%" . addslashes($req_keyword) .
                "%' ";
            $fields .= "&keyword=$_REQUEST[keyword]$fields";
        }

        $sql_sel = "SELECT followers_id, followers_name, followers_url, followers_logo, followers_header, followers_status, addeddate FROM " .
            $CFG['table']['followers'] . " WHERE  followers_id IS NOT NULL $condition $sort";
        $total_pages = $this->ExecuteQuery($sql_sel, 'norows');

        $targetpage = "followersManage.php";
        $next_page = $this->make_page($targetpage, $total_pages, $limit, $page, $fields);
        $sql_limit = $sql_sel . " LIMIT " . $sql_lim;
        $result = mysqli_query($this->DBCONN,$sql_limit) or die(mysqli_error($this->DBCONN));
        $cnt = 1;
        while ($row_seller = mysqli_fetch_array($result))
        {
            $row_seller['sno'] = (($page - 1) * $limit) + $cnt;
            $categoryList[] = $row_seller;
            $cnt++;
        }

        #From & To Records
        if ($page == 1)
        {
            $fromRecords = 1;
            $toRecords = $limit;
            if ($toRecords >= $total_pages)
                $toRecords = $total_pages;
        } else
        {
            $fromRecords = $start + 1;
            $toRecords = $start + $limit;
            if ($toRecords >= $total_pages)
                $toRecords = $total_pages;
        }

        $admin_smarty->assign("tablename", $CFG['table']['followers']);
        $admin_smarty->assign("whereField", 'followers_id');
        $admin_smarty->assign("fieldname", 'followers_status');
        $admin_smarty->assign("word", 'followers');
        $admin_smarty->assign("filename", 'followersManage.php');
        $admin_smarty->assign("page", $page);

        $admin_smarty->assign("totalRecords", $total_pages);
        $admin_smarty->assign("fromRecords", $fromRecords);
        $admin_smarty->assign("toRecords", $toRecords);
        $admin_smarty->assign("limit", $limit);

        $admin_smarty->assign("followers_List", $categoryList);
        $admin_smarty->assign("pagination", $next_page);
    }
    #--------------------------------------------------------------------------------
    #  Cuisine Management
    #--------------------------------------------------------------------------------
    #cuisine validation
    /**
     * AdminManagement::cuisineValidation()
     * 
     * @return
     */
    function cuisineValidation()
    {
        global $CFG;

        $cuisine_name = $this->filterInput($_POST["cuisine_name"]);
        $noofrows = $this->getNumvalues($CFG['table']['cuisine'], "cuisine_name='" . $cuisine_name .
            "'");

        if ($noofrows != 0)
        {
            echo "exist";
            exit();
        }
    }
    #--------------------------------------------------------------------------------
    #Add new cuisine name
    /**
     * AdminManagement::newCuisineAdd()
     * 
     * @return
     */
    function newCuisineAdd()
    {
        global $CFG, $admin_smarty, $objThumb;

        $cus_name = $this->filterInput($_POST["cuisine_name"]);
        $cus_desc = $this->filterInput($_POST['content']);
        $cusname_seourl = $this->seoUrl($_POST["cuisine_name"]);

        #$query          = "INSERT INTO ".$CFG['table']['cuisine']." SET cuisine_name = '".$cus_name."', cuisine_seourl = '".$cusname_seourl."', cuisine_description = '".$cus_desc."', addeddate = NOW()";
        #$LastInsertedId = $this->ExecuteQuery($query, "insert");
        $imagesizedata = getimagesize($_FILES['cuisine_photo']['tmp_name']); 
        if (isset($_FILES['cuisine_photo']['name']) && !empty($_FILES['cuisine_photo']['name']) && $imagesizedata == TRUE)
        {
            if (($_FILES['cuisine_photo']['size'] > 0) && ($_FILES['cuisine_photo']['size'] <=
                $CFG['site']['max_img_upload_size']))
            {
                $query = "INSERT INTO " . $CFG['table']['cuisine'] . " SET cuisine_name = '" . $cus_name .
                    "', cuisine_seourl = '" . $cusname_seourl . "', cuisine_description = '" . $cus_desc .
                    "', addeddate = '" . CUR_TIME . "'";
                $LastInsertedId = $this->ExecuteQuery($query, "insert");

                $logoext = $this->getFileExtension($_FILES['cuisine_photo']['name']);
                $logoname = $this->seoUrl($_POST["cuisine_name"]) . "." . $logoext;
                $logoimage = "photo_" . $logoname;
                $dest_name = $CFG['site']['photo_cuisine_path'] . '/' . $logoimage;
                
                $uploadsuccess = @move_uploaded_file($_FILES['cuisine_photo']['tmp_name'], $dest_name);
                @chmod($dest_name, 0777);
                if ($uploadsuccess)
                {
                    #Get Thumbnail width & height
                    $cuisinethumb = $this->iconSettingValues();

                    #Create Thumbnail
                    $sour_imagepath = $dest_name;
                    $photo = "thumb_" . $logoname;

                    $dest_imagepath = $CFG['site']['photo_cuisine_path'] . '/' . $photo;
                    $objThumb->createThumb($sour_imagepath, $dest_imagepath, $cuisinethumb['0']['cuisine_thumb_width'],
                        $cuisinethumb['0']['cuisine_thumb_height'], 'exact');
                    $dest_imagepath1 = $CFG['site']['photo_cuisine_path'] . '/large/' . $photo;
                    $objThumb->createThumb($sour_imagepath, $dest_imagepath1, $cuisinethumb['0']['cuisine_large_width'],
                        $cuisinethumb['0']['cuisine_large_height'], 'crop');

                    @unlink($dest_name);

                    $query = "UPDATE " . $CFG['table']['cuisine'] . " SET cuisine_photo = '" . $photo .
                        "' WHERE cuisine_id = '" . $LastInsertedId . "' ";
                    $res = $this->ExecuteQuery($query, "update");
                }
                $this->redirectUrl("cuisineManage.php");
            } else
            {
                $admin_smarty->assign("errorMsg", "Image size should be less than 2MB");
            }
        } else
        {
            $query = "INSERT INTO " . $CFG['table']['cuisine'] . " SET cuisine_name = '" . $cus_name .
                "', cuisine_seourl = '" . $cusname_seourl . "', cuisine_description = '" . $cus_desc .
                "', addeddate = '" . CUR_TIME . "'";
            $LastInsertedId = $this->ExecuteQuery($query, "insert");

            if ($LastInsertedId)
                $this->redirectUrl("cuisineManage.php");
        }
    }
    #--------------------------------------------------------------------------------
    #cuisine Editvalidation
    /**
     * AdminManagement::cuisineEditValidation()
     * 
     * @return
     */
    function cuisineEditValidation()
    {
        global $CFG;

        $cuisine_name = $this->filterInput($_POST['cuisine_name']);
        $cusid        = $this->filterInput($_POST['cusid']);

        $noofrows = $this->getNumvalues($CFG['table']['cuisine'], "cuisine_name='" . $cuisine_name .
            "' AND cuisine_id !='" . $cusid . "' ");
        if ($noofrows != 0)
        {
            echo "exist";
            exit();
        }
    }
    #--------------------------------------------------------------------------------
    #Edit Cuisine Name
    /**
     * AdminManagement::editCuisineName()
     * 
     * @return
     */
    function editCuisineName()
    {
        global $CFG, $admin_smarty, $objThumb;
        $cuisine_name = $this->filterInput($_POST["cuisine_name"]);
        $cus_desc = $this->filterInput_content($_POST['content']);
        $cusname_seourl = $this->seoUrl($_POST["cuisine_name"]);
        $cusid        = $this->filterInput($_GET['cusid']);

        $UpQuery = "UPDATE " . $CFG['table']['cuisine'] . " SET cuisine_name = '" . $cuisine_name .
            "', cuisine_seourl = '" . $cusname_seourl . "', cuisine_description = '" . $cus_desc .
            "'	WHERE cuisine_id  = '" . $cusid . "' ";
        $UpResult = $this->ExecuteQuery($UpQuery, 'update');
        
        $imagesizedata = getimagesize($_FILES['cuisine_photo']['tmp_name']); 
        if (isset($_FILES['cuisine_photo']['name']) && !empty($_FILES['cuisine_photo']['name']) && $imagesizedata == TRUE)
        {
            if (($_FILES['cuisine_photo']['size'] > 0) && ($_FILES['cuisine_photo']['size'] <=
                $CFG['site']['max_img_upload_size']))
            {
                $getphotoname = $this->getValue("cuisine_photo", $CFG['table']['cuisine'],
                    "cuisine_id = '" . $cusid . "' ");
                    
                if (!empty($getphotoname))
                {
                    @unlink($CFG['site']['photo_cuisine_path'] . '/' . $getphotoname);
                }
                
                $logoext = $this->getFileExtension($_FILES['cuisine_photo']['name']);
                $logoname = $this->seoUrl($_POST["cuisine_name"]).time()."." . $logoext;
                $logoimage = "photo_". $logoname;
                $dest_name = $CFG['site']['photo_cuisine_path'] . '/' . $logoimage;
                #echo "name->".$dest_name;exit;
                $uploadsuccess = @move_uploaded_file($_FILES['cuisine_photo']['tmp_name'], $dest_name);
                @chmod($dest_name, 0777);

                if ($uploadsuccess)
                {
                    #Get Thumbnail width & height
                    $cuisinethumb = $this->iconSettingValues();

                    #Create Thumbnail
                    $sour_imagepath = $dest_name;
                    $photo = "thumb_" . $logoname;

                    $dest_imagepath = $CFG['site']['photo_cuisine_path'] . '/' . $photo;
                    $objThumb->createThumb($sour_imagepath, $dest_imagepath, $cuisinethumb['0']['cuisine_thumb_width'],
                        $cuisinethumb['0']['cuisine_thumb_height'], 'exact');
                    $dest_imagepath1 = $CFG['site']['photo_cuisine_path'] . '/large/' . $photo;
                    $objThumb->createThumb($sour_imagepath, $dest_imagepath1, $cuisinethumb['0']['cuisine_large_width'],
                        $cuisinethumb['0']['cuisine_large_height'], 'crop');
                    @unlink($dest_name);

                    $query = "UPDATE " . $CFG['table']['cuisine'] . " SET cuisine_photo = '" . $photo .
                        "' WHERE cuisine_id = '" . $cusid . "' ";
                    $res = $this->ExecuteQuery($query, "update");
                }
                $this->redirectUrl("cuisineManage.php");
            } else
            {
                $admin_smarty->assign("errorMsg", "Image size should be less than 2MB");
            }
        }
        if ($UpResult)
            $this->redirectUrl("cuisineManage.php");
    }
    #--------------------------------------------------------------------------------
    #Cuisine List manage
    /**
     * AdminManagement::cuisineList()
     * 
     * @return
     */
    function cuisineList()
    {
        global $CFG, $admin_smarty;

        $req_keyword        = $this->filterInput($_REQUEST['keyword']);

        if (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'casc')
        {
            $sort = " ORDER BY cuisine_name ASC";
            $fields .= "&sortby=" . $_REQUEST['sortby'];
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'cdesc')
        {
            $sort = " ORDER BY cuisine_name DESC";
            $fields .= "&sortby=" . $_REQUEST['sortby'];
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'iasc')
        {
            $sort = " ORDER BY cuisine_id ASC";
            $fields .= "&sortby=" . $_REQUEST['sortby'];
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'idesc')
        {
            $sort = " ORDER BY cuisine_id DESC";
            $fields .= "&sortby=" . $_REQUEST['sortby'];
        } else
        {
            $sort .= " ORDER BY cuisine_id DESC";
        }

        #Status
        if (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'active')
        {
            $condition .= " AND cuisine_status = '1' ";
            $fields .= "&sortby=" . $_REQUEST['sortby'];
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'deactive')
        {
            $condition .= " AND cuisine_status = '0' ";
            $fields .= "&sortby=" . $_REQUEST['sortby'];
        }

        if (isset($_REQUEST['limit']) && !empty($_REQUEST['limit']) && ($_REQUEST['limit'] !=
            "all"))
        {
            $limit = $this->filterInput($_REQUEST['limit']);
            $fields .= "&limit=$_REQUEST[limit]";
        } else
        {
            $limit = PAGELIMIT;
        }

        $page = $this->filterInput($_REQUEST['page']);
        if ($page == 0)
            $page = 1;
        if ($page)
            $start = ($page - 1) * $limit;
        else
            $start = 0;

        if (!empty($_REQUEST['limit']) && ($_REQUEST['limit'] == "all"))
        {
            $sql_lim = $this->filterInput($_REQUEST['limit']);
        } else
        {
            $sql_lim = "$start, $limit";
        }

        #Keyword
        if (isset($req_keyword) && !empty($req_keyword))
        {
            $keyword = "&keyword=$_REQUEST[keyword]";
            $condition .= "AND cuisine_name LIKE '%" . addslashes($req_keyword) .
                "%' ";
            $fields .= "&keyword=$_REQUEST[keyword]";
        }

        $sql_sel = "SELECT cuisine_id, cuisine_name, cuisine_photo, cuisine_status, addeddate FROM " .
            $CFG['table']['cuisine'] . " WHERE delete_status = 'No' AND  cuisine_id IS NOT NULL $condition $sort";
        $total_pages = $this->ExecuteQuery($sql_sel, 'norows');

        $targetpage = "cuisineManage.php";
        $next_page = $this->make_page($targetpage, $total_pages, $limit, $page, $fields);
        $sql_limit = $sql_sel . " LIMIT " . $sql_lim;
        $result = mysqli_query($this->DBCONN,$sql_limit) or die(mysqli_error($this->DBCONN));
        $cnt = 1;
        while ($row_seller = mysqli_fetch_array($result))
        {
            $row_seller['sno'] = (($page - 1) * $limit) + $cnt;
            $row_seller['addeddate'] = $this->setDateFormatWithOutTime($row_seller['addeddate']);
            $categoryList[] = $row_seller;
            $cnt++;
        }

        #From & To Records
        if ($page == 1)
        {
            $fromRecords = 1;
            $toRecords = $limit;
            if ($toRecords >= $total_pages)
                $toRecords = $total_pages;
        } else
        {
            $fromRecords = $start + 1;
            $toRecords = $start + $limit;
            if ($toRecords >= $total_pages)
                $toRecords = $total_pages;
        }

        $admin_smarty->assign("tablename", $CFG['table']['cuisine']);
        $admin_smarty->assign("whereField", 'cuisine_id');
        $admin_smarty->assign("fieldname", 'cuisine_status');
        $admin_smarty->assign("word", 'Cuisine');
        $admin_smarty->assign("filename", 'cuisineManage.php');
        $admin_smarty->assign("page", $page);

        $admin_smarty->assign("totalRecords", $total_pages);
        $admin_smarty->assign("fromRecords", $fromRecords);
        $admin_smarty->assign("toRecords", $toRecords);
        $admin_smarty->assign("limit", $limit);

        $admin_smarty->assign("cuisine_List", $categoryList);
        $admin_smarty->assign("pagination", $next_page);
    }
     #--------------------------------------------------------------------------------
    #Cuisine List manage
    /**
     * AdminManagement::cuisineList()
     * 
     * @return
     */
    function cuisineDeleteList()
    {
        global $CFG, $admin_smarty;

        $req_keyword        = $this->filterInput($_REQUEST['keyword']);

        if (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'casc')
        {
            $sort = " ORDER BY cuisine_name ASC";
            $fields .= "&sortby=" . $_REQUEST['sortby'];
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'cdesc')
        {
            $sort = " ORDER BY cuisine_name DESC";
            $fields .= "&sortby=" . $_REQUEST['sortby'];
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'iasc')
        {
            $sort = " ORDER BY cuisine_id ASC";
            $fields .= "&sortby=" . $_REQUEST['sortby'];
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'idesc')
        {
            $sort = " ORDER BY cuisine_id DESC";
            $fields .= "&sortby=" . $_REQUEST['sortby'];
        } else
        {
            $sort .= " ORDER BY cuisine_id DESC";
        }

        #Status
        if (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'active')
        {
            $condition .= " AND cuisine_status = '1' ";
            $fields .= "&sortby=" . $_REQUEST['sortby'];
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'deactive')
        {
            $condition .= " AND cuisine_status = '0' ";
            $fields .= "&sortby=" . $_REQUEST['sortby'];
        }

        if (isset($_REQUEST['limit']) && !empty($_REQUEST['limit']) && ($_REQUEST['limit'] !=
            "all"))
        {
            $limit = $this->filterInput($_REQUEST['limit']);
            $fields .= "&limit=$_REQUEST[limit]";
        } else
        {
            $limit = PAGELIMIT;
        }

        $page = $this->filterInput($_REQUEST['page']);
        if ($page == 0)
            $page = 1;
        if ($page)
            $start = ($page - 1) * $limit;
        else
            $start = 0;

        if (!empty($_REQUEST['limit']) && ($_REQUEST['limit'] == "all"))
        {
            $sql_lim = $this->filterInput($_REQUEST['limit']);
        } else
        {
            $sql_lim = "$start, $limit";
        }

        #Keyword
        if (isset($req_keyword) && !empty($req_keyword))
        {
            $keyword = "&keyword=$_REQUEST[keyword]";
            $condition .= "AND cuisine_name LIKE '%" . addslashes($req_keyword) .
                "%' ";
            $fields .= "&keyword=$_REQUEST[keyword]";
        }

        $sql_sel = "SELECT cuisine_id, cuisine_name, cuisine_photo, cuisine_status, addeddate FROM " .
            $CFG['table']['cuisine'] . " WHERE delete_status = 'Yes' AND cuisine_id IS NOT NULL $condition $sort";
        $total_pages = $this->ExecuteQuery($sql_sel, 'norows');

        $targetpage = "cuisineDeleteManage.php";
        $next_page = $this->make_page($targetpage, $total_pages, $limit, $page, $fields);
        $sql_limit = $sql_sel . " LIMIT " . $sql_lim;
        $result = mysqli_query($this->DBCONN,$sql_limit) or die(mysqli_error($this->DBCONN));
        $cnt = 1;
        while ($row_seller = mysqli_fetch_array($result))
        {
            $row_seller['sno'] = (($page - 1) * $limit) + $cnt;
            $categoryList[] = $row_seller;
            $cnt++;
        }

        #From & To Records
        if ($page == 1)
        {
            $fromRecords = 1;
            $toRecords = $limit;
            if ($toRecords >= $total_pages)
                $toRecords = $total_pages;
        } else
        {
            $fromRecords = $start + 1;
            $toRecords = $start + $limit;
            if ($toRecords >= $total_pages)
                $toRecords = $total_pages;
        }

        $admin_smarty->assign("tablename", $CFG['table']['cuisine']);
        $admin_smarty->assign("whereField", 'cuisine_id');
        $admin_smarty->assign("fieldname", 'cuisine_status');
        $admin_smarty->assign("word", 'Cuisine');
        $admin_smarty->assign("filename", 'cuisineManage.php');
        $admin_smarty->assign("page", $page);

        $admin_smarty->assign("totalRecords", $total_pages);
        $admin_smarty->assign("fromRecords", $fromRecords);
        $admin_smarty->assign("toRecords", $toRecords);
        $admin_smarty->assign("limit", $limit);

        $admin_smarty->assign("cuisine_List", $categoryList);
        $admin_smarty->assign("pagination", $next_page);
    }
    #--------------------------------------------------------------------------------
    #Export Main Category
    /**
     * AdminManagement::exportCuisineList()
     * 
     * @return
     */
    function exportCuisineList()
    {
        global $CFG;

        #File name
        $file_name = "Cuisine_" . date("dmY-His");
        $export_val_arr = array('cuisine_id', 'cuisine_name');

        #Table
        $selectfld = "cuisine_id, cuisine_name";
        $tablename = $CFG['table']['cuisine'];
        $tblcondition = "cuisine_id != '' ORDER BY cuisine_name ASC";
        $table_arr = array(
            $selectfld,
            $tablename,
            $tblcondition);

        #CSV
        $csv_heading_arr = array("Cuisine Id", "Cuisine Name");

        #Xls
        $xls_heading_arr = "Cuisine Id\tCuisine Name";

        $this->exportProcessCSVXLS($file_name, $table_arr, $export_val_arr, $csv_heading_arr,
            $xls_heading_arr);
    }
    #--------------------------------------------------------------------------------
    #Import Main Category
    /**
     * AdminManagement::importCuisineList()
     * 
     * @return
     */
    function importCuisineList()
    {
        global $CFG;

        $tablename = $CFG['table']['cuisine'];
        $dbfields = array("cuisine_name");
        $filename = "cuisineManage.php";

        $this->importProcessCSV($tablename, $dbfields, $filename);
    }
    #--------------------------------------------------------------------------------
    #Addons Sub Add & Check Availability
    /**
     * AdminManagement::addonsSubNew()
     * 
     * @return
     */
    function addonsSubNew()
    {
        global $CFG;

        $addons_name = $this->filterInput($_POST['addons_name']);
        $noofrows = $this->getNumvalues($CFG['table']['addons'], "addonsname='" . $addons_name .
            "' AND parentid != '0'");

        if ($noofrows > 0)
        {
            echo "exist";
        } else
        {
            $query = "INSERT INTO " . $CFG['table']['addons'] . " SET addonsname = '" . $addons_name .
                "', parentid = '" . $_POST['said'] . "', addeddate = '" . CUR_TIME . "'";
            $res = $this->ExecuteQuery($query, "insert");
            echo "insert";
        }
    }
    #--------------------------------------------------------------------------------
    #  FAQ MANAGEMENT START  #
    #--------------------------------------------------------------------------------
    #Faq Add
    /**
     * AdminManagement::faqAdd()
     * 
     * @return
     */
    function faqAdd()
    {
        global $CFG, $admin_smarty;

        $question = $this->filterInput($_POST['question']);
        $answer = $this->filterInput($_POST['content']);

        $faqnum = $this->getNumvalues($CFG['table']['faq'], "question = '" . $question .
            "' ");
        if ($faqnum == '0' && !empty($answer))
        {
            $inssql = "INSERT INTO 
        								" . $CFG['table']['faq'] . " 
        							SET 
        								question 	= '" . $question . "', 
        								answer 		= '" . $answer . "',
        								addeddate 	= '" . CUR_TIME . "'";
            $ressql = $this->ExecuteQuery($inssql, "insert");
            $this->redirectUrl("faqManage.php");
        } elseif (empty($answer))
        {
            $admin_smarty->assign("ErrorMessage", 'Answer should not be blank');
        } else
        {
            $admin_smarty->assign("ErrorMessage", 'Content ' . $question . ' already exists');
        }
    }
    #--------------------------------------------------------------------------------
    #Faq Update
    /**
     * AdminManagement::faqEdit()
     * 
     * @param mixed $fid
     * @return
     */
    function faqEdit($fid)
    {
        global $CFG, $admin_smarty;

        $question = $this->filterInput($_POST['question']);
        $answer = $this->filterInput($_POST['content']);
        $faq_id = $this->filterInput($_POST['faq_id']);

        $faqnum = $this->getNumvalues($CFG['table']['faq'], "question = '" . $question .
            "' AND faq_id != '" . $fid . "' ");
        if ($faqnum == '0' && !empty($answer))
        {
            $inssql = "UPDATE  
        								" . $CFG['table']['faq'] . " 
        							SET 
        								question 	= '" . $question . "', 
        								answer 		= '" . $answer . "'
        							WHERE faq_id = '" . $fid . "' ";
            $ressql = $this->ExecuteQuery($inssql, "update");
            $this->redirectUrl("faqManage.php");
        } elseif (empty($answer))
        {
            $admin_smarty->assign("ErrorMessage", 'Content should not be blank');
        } else
        {
            $admin_smarty->assign("ErrorMessage", 'Content ' . $question . ' already exists');
        }
    }
    #--------------------------------------------------------------------------------
    #Faq List
    /**
     * AdminManagement::faqManageList()
     * 
     * @return
     */
    function faqManageList()
    {
        global $CFG, $admin_smarty;

        $req_keyword        = $this->filterInput($_REQUEST['keyword']);

        #sort order
        if (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'qasc')
        {
            $sort = " ORDER BY question ASC";
            $fields .= "&sortby=qasc";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'qdesc')
        {
            $sort = " ORDER BY question DESC";
            $fields .= "&sortby=qdesc";
        } else
        {
            $sort = " ORDER BY faq_id DESC";
        }

        #Status
        if (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'active')
        {
            $condition .= " AND faq_status = '1' ";
            $fields .= "&sortby=" . $_REQUEST['sortby'];
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'deactive')
        {
            $condition .= " AND faq_status = '0' ";
            $fields .= "&sortby=" . $_REQUEST['sortby'];
        }

        if (isset($_REQUEST['limit']) && !empty($_REQUEST['limit']) && ($_REQUEST['limit'] !=
            "all"))
        {
            $limit = $this->filterInput($_REQUEST['limit']);
            $fields = "&limit=$_REQUEST[limit]";
        } else
        {
            $limit = PAGELIMIT;
        }

        $page = $this->filterInput($_REQUEST['page']);
        if ($page == 0)
            $page = 1;
        if ($page)
            $start = ($page - 1) * $limit;
        else
            $start = 0;

        if (!empty($_REQUEST['limit']) && ($_REQUEST['limit'] == "all"))
        {
            $sql_lim = $this->filterInput($_REQUEST['limit']);
        } else
        {
            $sql_lim = "$start, $limit";
        }

        #Keyword
        if (isset($req_keyword) && !empty($req_keyword))
        {
            $keyword = "&keyword=$_REQUEST[keyword]";
            $condition .= "AND ( question LIKE '%" . addslashes($req_keyword) .
                "%' OR answer LIKE '%" . addslashes($req_keyword) . "%' )";
            $fields .= "&keyword=$_REQUEST[keyword]$fields";
        }

        $sql_sel = "SELECT faq_id, question, addeddate, faq_status FROM " . $CFG['table']['faq'] .
            " WHERE faq_id IS NOT NULL $condition $sort ";
        $total_pages = $this->ExecuteQuery($sql_sel, 'norows');

        $targetpage = "faqManage.php";
        $next_page = $this->make_page($targetpage, $total_pages, $limit, $page, $fields);
        $sql_limit = $sql_sel . " LIMIT " . $sql_lim;
        $result = mysqli_query($this->DBCONN,$sql_limit) or die(mysqli_error($this->DBCONN));
        $cnt = 1;
        while ($row_seller = mysqli_fetch_array($result))
        {
            $row_seller['sno'] = (($page - 1) * $limit) + $cnt;
            $row_seller['addeddate'] = $this->setDateFormatWithOutTime($row_seller['addeddate']);
            $faqManageList[] = $row_seller;
            $cnt++;
        }

        #From & To Records
        if ($page == 1)
        {
            $fromRecords = 1;
            $toRecords = $limit;
            if ($toRecords >= $total_pages)
                $toRecords = $total_pages;
        } else
        {
            $fromRecords = $start + 1;
            $toRecords = $start + $limit;
            if ($toRecords >= $total_pages)
                $toRecords = $total_pages;
        }

        $admin_smarty->assign("tablename", $CFG['table']['faq']);
        $admin_smarty->assign("whereField", 'faq_id');
        $admin_smarty->assign("fieldname", 'faq_status');
        $admin_smarty->assign("word", 'Faq');
        $admin_smarty->assign("filename", 'faqManage.php');
        $admin_smarty->assign("page", $page);

        $admin_smarty->assign("totalRecords", $total_pages);
        $admin_smarty->assign("fromRecords", $fromRecords);
        $admin_smarty->assign("toRecords", $toRecords);
        $admin_smarty->assign("limit", $limit);
        $admin_smarty->assign("limit", $limit);


        $admin_smarty->assign("faqManageList", $faqManageList);
        $admin_smarty->assign("pagination", $next_page);
    }
    #--------------------------------------------------------------------------------
    #Export Faq
    /**
     * AdminManagement::exportFaq()
     * 
     * @return
     */
    function exportFaq()
    {
        global $CFG;

        #File name
        $file_name = "FAQ_" . date("dmY-His");
        $export_val_arr = array(
            'faq_id',
            'question',
            'answer');

        #Table
        $selectfld = "faq_id, question, answer";
        $tablename = $CFG['table']['faq'];
        $tblcondition = "faq_id != '' ORDER BY faq_id ASC";
        $table_arr = array(
            $selectfld,
            $tablename,
            $tblcondition);

        #CSV
        $csv_heading_arr = array(
            "Faq Id",
            "Question",
            "Answer");

        #Xls
        $xls_heading_arr = "Faq Id\tQuestion\tAnswer";

        $this->exportProcessCSVXLS($file_name, $table_arr, $export_val_arr, $csv_heading_arr,
            $xls_heading_arr);
    }
    #--------------------------------------------------------------------------------
    #Import Faq
    /**
     * AdminManagement::importFaq()
     * 
     * @return
     */
    function importFaq()
    {
        global $CFG;

        $tablename = $CFG['table']['faq'];
        $dbfields = array("question", "answer");
        $filename = "faqManage.php";

        $this->importProcessCSV($tablename, $dbfields, $filename);
    }
    #--------------------------------------------------------------------------------
    #Content Management
    #--------------------------------------------------------------------------------
    #Add new Content
    /**
     * AdminManagement::newContentAdd()
     * 
     * @return
     */
    function newContentAdd()
    {
        global $CFG, $admin_smarty;

        $content_title = $this->filterInput($_POST['title']);
        $content = $this->filterInput_content($_POST['content']);
        $Metatagtitle = $this->filterInput($_POST['mettitle']);
        $Metatagdescription = $this->filterInput($_POST['metdes']);
        $Metatagkeyword = $this->filterInput($_POST['metkey']);
        $displayfooter = $this->filterInput($_POST['dis_footer']);
        $displaycus = $this->filterInput($_POST['dis_page']);
        $terms = $this->filterInput($_POST['terms']);

        $content_seourl = $this->seoUrl($_POST['title']);

        $contentnum = $this->getNumvalues($CFG['table']['content'], "content_title = '" .
            $content_title . "' ");
        if ($contentnum == '0' && !empty($content))
        {
            $inssql = "INSERT INTO 
        								" . $CFG['table']['content'] . " 
        							SET 
        								content_title 		= '" . $content_title . "',
        								content 			= '" . $content . "',
        								content_seourl  	= '" . $content_seourl . "',
        								metatagtitle 		= '" . $Metatagtitle . "',
        								metatagdescription  = '" . $Metatagdescription . "',
        								metatagkeyword 		= '" . $Metatagkeyword . "',
        								display_footer 		= '" . $displayfooter . "',
        								display_customer 	= '" . $displaycus . "',
        								termscondition 	    = '" . $terms . "',
        								addeddate 			= '" . CUR_TIME . "'";
            $ressql = $this->ExecuteQuery($inssql, "insert");
            $this->redirectUrl("contentManage.php");
        } elseif (empty($content))
        {
            $admin_smarty->assign("ErrorMessage", 'Content should not be blank');
        } else
        {
            $admin_smarty->assign("ErrorMessage", 'Content ' . $content_title .
                ' already exists');
        }
    }
    #--------------------------------------------------------------------------------
    #content Edit
    /**
     * AdminManagement::contentEdit()
     * 
     * @param mixed $conid
     * @return
     */
    function contentEdit($conid)
    {
        global $CFG, $admin_smarty;

        $content_title = $this->filterInput($_POST['title']);
        $content = $this->filterInput_content($_POST['content']);
        $Metatagtitle = $this->filterInput($_POST['mettitle']);
        $Metatagdescription = $this->filterInput($_POST['metdes']);
        $Metatagkeyword = $this->filterInput($_POST['metkey']);
        $displayfooter = $this->filterInput($_POST['dis_footer']);
        $displaycus = $this->filterInput($_POST['dis_page']);
        $terms = $this->filterInput($_POST['terms']);

        $content_seourl = $this->seoUrl($_POST['title']);

        $contentnum = $this->getNumvalues($CFG['table']['content'], "content_title = '" .
            $content_title . "' AND content_id != '" . $conid . "' ");
        if ($contentnum == '0' && !empty($content))
        {
            $inssql = "UPDATE  
        								" . $CFG['table']['content'] . " 
        							SET 
        								content_title 		= '" . $content_title . "',
        								content 			= '" . $content . "',
        								content_seourl  	= '" . $content_seourl . "',
        								metatagtitle 		= '" . $Metatagtitle . "',
        								metatagdescription  = '" . $Metatagdescription . "',
        								metatagkeyword 		= '" . $Metatagkeyword . "',
        								display_footer 		= '" . $displayfooter . "',
        								display_customer 	= '" . $displaycus . "',
        								termscondition 	    = '" . $terms . "'
        						   WHERE 
        							    content_id = '" . $conid . "' ";
            $ressql = $this->ExecuteQuery($inssql, "update");
            $this->redirectUrl("contentManage.php");
        } elseif (empty($content))
        {
            $admin_smarty->assign("ErrorMessage", 'Content should not be blank');
        } else
        {
            $admin_smarty->assign("ErrorMessage", 'Content ' . $content_title .
                ' already exists');
        }
    }
    #--------------------------------------------------------------------------------
    #Content List manage
    /**
     * AdminManagement::contentList()
     * 
     * @return
     */
    function contentList()
    {
        global $CFG, $admin_smarty;

        $req_keyword        = $this->filterInput($_REQUEST['keyword']);

        if (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'tasc')
        {
            $sort = " ORDER BY content_title ASC";
            $fields .= "&sortby=tasc";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'tdesc')
        {
            $sort = " ORDER BY content_title DESC";
            $fields .= "&sortby=tdesc";
        } else
        {
            $sort .= " ORDER BY content_title ASC";
        }

        #Status
        if (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'active')
        {
            $condition .= " AND status = '1' ";
            $fields .= "&sortby=" . $_REQUEST['sortby'];
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'deactive')
        {
            $condition .= " AND status = '0' ";
            $fields .= "&sortby=" . $_REQUEST['sortby'];
        }

        if (isset($_REQUEST['limit']) && !empty($_REQUEST['limit']) && ($_REQUEST['limit'] !=
            "all"))
        {
            $limit = $this->filterInput($_REQUEST['limit']);
            $fields = "&limit=$_REQUEST[limit]";
        } else
        {
            $limit = PAGELIMIT;
        }

        $page = $this->filterInput($_REQUEST['page']);
        if ($page == 0)
            $page = 1;
        if ($page)
            $start = ($page - 1) * $limit;
        else
            $start = 0;

        if (!empty($_REQUEST['limit']) && ($_REQUEST['limit'] == "all"))
        {
            $sql_lim = $this->filterInput($_REQUEST['limit']);
        } else
        {
            $sql_lim = "$start, $limit";
        }

        #Keyword
        if (isset($req_keyword) && !empty($req_keyword))
        {
            $keyword = "&keyword=$_REQUEST[keyword]";
            $condition .= "AND content_title LIKE '%" . addslashes($req_keyword) .
                "%' ";
            $fields .= "&keyword=$_REQUEST[keyword]$fields";
        }

        $sql_sel = "SELECT content_id, content_title, sortorder, addeddate, status FROM " .
            $CFG['table']['content'] . " WHERE  content_id IS NOT NULL $condition $sort";
        $total_pages = $this->ExecuteQuery($sql_sel, 'norows');

        $targetpage = "contentManage.php";
        $next_page = $this->make_page($targetpage, $total_pages, $limit, $page, $fields);
        $sql_limit = $sql_sel . " LIMIT " . $sql_lim;
        $result = mysqli_query($this->DBCONN,$sql_limit) or die(mysqli_error($this->DBCONN));
        $cnt = 1;
        while ($row_seller = mysqli_fetch_array($result))
        {
            $row_seller['sno'] = (($page - 1) * $limit) + $cnt;
            $row_seller['addeddate'] = $this->setDateFormatWithOutTime($row_seller['addeddate']);
            $categoryList[] = $row_seller;
            $cnt++;
        }

        #From & To Records
        if ($page == 1)
        {
            $fromRecords = 1;
            $toRecords = $limit;
            if ($toRecords >= $total_pages)
                $toRecords = $total_pages;
        } else
        {
            $fromRecords = $start + 1;
            $toRecords = $start + $limit;
            if ($toRecords >= $total_pages)
                $toRecords = $total_pages;
        }

        $admin_smarty->assign("tablename", $CFG['table']['content']);
        $admin_smarty->assign("whereField", 'content_id');
        $admin_smarty->assign("fieldname", 'status');
        $admin_smarty->assign("word", 'Content');
        $admin_smarty->assign("filename", 'contentManage.php');
        $admin_smarty->assign("page", $page);

        $admin_smarty->assign("totalRecords", $total_pages);
        $admin_smarty->assign("fromRecords", $fromRecords);
        $admin_smarty->assign("toRecords", $toRecords);
        $admin_smarty->assign("limit", $limit);

        $admin_smarty->assign("content_List", $categoryList);
        $admin_smarty->assign("pagination", $next_page);
    }
    #---------------------------------------------------------------------------------
    #content Sort order
    /**
     * AdminManagement::updateContentOrder()
     * 
     * @return
     */
    function updateContentOrder()
    {
        global $CFG, $admin_smarty;

        $updateRecordsArray = explode("^", $_POST['data']);
        foreach ($updateRecordsArray as $key => $value)
        {
            if (!empty($value))
            {
                $uporder = "UPDATE " . $CFG['table']['content'] . " SET sortorder = '" . $key .
                    "' WHERE content_id = '" . $this->filterInput($value) . "' ";
                $resorder = $this->ExecuteQuery($uporder, "update");
            }
        }
    }
    #--------------------------------------------------------------------------------
    #Export Faq
    /**
     * AdminManagement::exportContent()
     * 
     * @return
     */
    function exportContent()
    {
        global $CFG;

        #File name
        $file_name = "Staticpage_" . date("dmY-His");
        $export_val_arr = array(
            'content_title',
            'content',
            'content_seourl',
            'metatagtitle',
            'metatagdescription',
            'metatagkeyword');

        #Table
        $selectfld = "content_title, content, content_seourl, metatagtitle, metatagdescription, metatagkeyword ";
        $tablename = $CFG['table']['content'];
        $tblcondition = "ORDER BY content_id ASC";
        $table_arr = array(
            $selectfld,
            $tablename,
            $tblcondition);

        #CSV
        $csv_heading_arr = array(
            "Title",
            "Description",
            "Content Seourl",
            "metatag title",
            "metatag description",
            "metatag keyword");

        #Xls
        $xls_heading_arr = "Title\tDescription\tContent Seourl\tmetatag title\tmetatag description\tmetatag keyword";

        $this->exportProcessCSVXLS($file_name, $table_arr, $export_val_arr, $csv_heading_arr,
            $xls_heading_arr);
    }
    #--------------------------------------------------------------------------------
    #Import Faq
    /**
     * AdminManagement::importContent()
     * 
     * @return
     */
    function importContent()
    {
        global $CFG;

        $tablename = $CFG['table']['content'];
        $dbfields = array(
            'content_title',
            'content',
            'content_seourl',
            'metatagtitle',
            'metatagdescription',
            'metatagkeyword');
        $filename = "contentManage.php";

        $this->importProcessCSV($tablename, $dbfields, $filename);
    }
    #--------------------------------------------------------------------------------
    #Language Management
    #--------------------------------------------------------------------------------
    #Add new Language name
    /**
     * AdminManagement::LanguageNameAdd()
     * 
     * @return
     */
    function LanguageNameAdd()
    {
        global $CFG;

        $lang_name = $this->filterInput($_POST["languagename"]);
        $lang_code = $this->filterInput(strtoupper($_POST["languagecode"]));
        //$seourl    = $this->seoUrl($_POST['languagename']);

        $noofrows = $this->getNumvalues($CFG['table']['language'], "lang_name='" . $lang_name .
            "' AND lang_code='" . $lang_code . "' ");

        if ($noofrows != 0)
        {
            echo "exist";
            exit();
        } else
        {
            #Copy Entire folder (general) to another
            $sourcedir = $CFG['site']['language_path'] . '/general';
            $destinationdir = $CFG['site']['language_path'] . '/' . $lang_code;
            $this->copy_directory($sourcedir, $destinationdir);

            $query = "INSERT INTO " . $CFG['table']['language'] . " SET lang_name='" . $lang_name .
                "', lang_code='" . $lang_code . "', addeddate = '" . CUR_TIME . "'";
            $res = $this->ExecuteQuery($query, "insert");
            echo "insert";
            exit();
        }
    }
    #---------------------------------------------------------------------------------------
    #Language List
    /**
     * AdminManagement::languageNameList()
     * 
     * @return
     */
    function languageNameList()
    {
        global $CFG, $admin_smarty;

        $req_keyword        = $this->filterInput($_REQUEST['keyword']);

        if (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'lnasc')
        {
            $sort = " ORDER BY lang_name ASC";
            $fields .= "&sortby=" . $_REQUEST['sortby'];
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'lndesc')
        {
            $sort = " ORDER BY lang_name DESC";
            $fields .= "&sortby=" . $_REQUEST['sortby'];
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'lcasc')
        {
            $sort = " ORDER BY lang_code ASC";
            $fields .= "&sortby=" . $_REQUEST['sortby'];
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'lcdesc')
        {
            $sort = " ORDER BY lang_code DESC";
            $fields .= "&sortby=" . $_REQUEST['sortby'];
        } else
        {
            $sort = " ORDER BY lang_name ASC";
        }
        #Status
        if (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'active')
        {
            $condition .= " AND lang_status = '1' ";
            $fields .= "&sortby=" . $_REQUEST['sortby'];
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'deactive')
        {
            $condition .= " AND lang_status = '0' ";
            $fields .= "&sortby=" . $_REQUEST['sortby'];
        }

        if (isset($_REQUEST['limit']) && !empty($_REQUEST['limit']) && ($_REQUEST['limit'] !=
            "all"))
        {
            $limit = $this->filterInput($_REQUEST['limit']);
            $fields = "&limit=$_REQUEST[limit]";
        } else
        {
            $limit = PAGELIMIT;
        }

        $page = $this->filterInput($_REQUEST['page']);
        if ($page == 0)
            $page = 1;
        if ($page)
            $start = ($page - 1) * $limit;
        else
            $start = 0;

        if (!empty($_REQUEST['limit']) && ($_REQUEST['limit'] == "all"))
        {
            $sql_lim = $this->filterInput($_REQUEST['limit']);
        } else
        {
            $sql_lim = "$start, $limit";
        }

        #Keyword
        if (isset($req_keyword) && !empty($req_keyword))
        {
            $keyword = "&keyword=$_REQUEST[keyword]";
            $condition .= "AND ( lang_name LIKE '%" . addslashes($req_keyword) .
                "%' OR  lang_code LIKE '%" . addslashes($req_keyword) . "%' ) ";
            $fields .= "&keyword=$_REQUEST[keyword]";
        }

        $sql_sel = "SELECT lang_id, lang_name, lang_code, lang_site, lang_status, addeddate FROM " .
            $CFG['table']['language'] . " WHERE lang_id IS NOT NULL $condition $sort";
        $total_pages = $this->ExecuteQuery($sql_sel, 'norows');

        $targetpage = "languageManage.php";
        $next_page = $this->make_page($targetpage, $total_pages, $limit, $page, $fields);
        $sql_limit = $sql_sel . " LIMIT " . $sql_lim;
        $result = mysqli_query($this->DBCONN,$sql_limit) or die(mysqli_error($this->DBCONN));
        $cnt = 1;
        while ($row_seller = mysqli_fetch_array($result))
        {
            $row_seller['sno'] = (($page - 1) * $limit) + $cnt . ".";
            $row_seller['addeddate'] = $this->setDateFormatWithOutTime($row_seller['addeddate']);
            $categoryList[] = $row_seller;
            $cnt++;
        }

        #From & To Records
        if ($page == 1)
        {
            $fromRecords = 1;
            $toRecords = $limit;
            if ($toRecords >= $total_pages)
                $toRecords = $total_pages;
        } else
        {
            $fromRecords = $start + 1;
            $toRecords = $start + $limit;
            if ($toRecords >= $total_pages)
                $toRecords = $total_pages;
        }

        $admin_smarty->assign("tablename", $CFG['table']['language']);
        $admin_smarty->assign("whereField", 'lang_id');
        $admin_smarty->assign("fieldname", 'lang_status');
        $admin_smarty->assign("word", 'Language');
        $admin_smarty->assign("filename", 'languageManage.php');
        $admin_smarty->assign("page", $page);

        $admin_smarty->assign("totalRecords", $total_pages);
        $admin_smarty->assign("fromRecords", $fromRecords);
        $admin_smarty->assign("toRecords", $toRecords);
        $admin_smarty->assign("limit", $limit);


        $admin_smarty->assign("languageName_list", $categoryList);
        $admin_smarty->assign("pagination", $next_page);
    }
    #----------------------------------------------------------------------------------------------------
    #Edit language
    /**
     * AdminManagement::languageNameEdit()
     * 
     * @return
     */
    function languageNameEdit()
    {
        global $CFG;

        $lang_name  = $this->filterInput($_POST["languagename"]);
        $lang_code  = $this->filterInput(strtoupper($_POST["languagecode"]));
        $lang_id    = $this->filterInput($_POST['lang_id']);
        //$seourl    = $this->seoUrl($_POST['statename']);

        $noforows = $this->getNumvalues($CFG['table']['language'], "lang_name = '" . $lang_name .
            "' AND lang_code = '" . $lang_code . "' AND  lang_id != '" . $lang_id .
            "'");
        if ($noforows != 0)
        {
            echo "exist";
            exit();
        } else
        {
            #Remove folder
            $sellangcode = $this->getValue('lang_code', $CFG['table']['language'],
                "lang_id = '" . $lang_id . "'");
            if (isset($sellangcode) && !empty($sellangcode))
            {
                $this->remove_directory($CFG['site']['language_path'] . '/' . $sellangcode);
            }

            #Copy Entire folder (general) to another
            $sourcedir = $CFG['site']['language_path'] . '/general';
            $destinationdir = $CFG['site']['language_path'] . '/' . $lang_code;
            $this->copy_directory($sourcedir, $destinationdir);

            $query = "UPDATE " . $CFG['table']['language'] . " SET lang_name = '" . $lang_name .
                "',lang_code ='" . $lang_code . "' WHERE lang_id = '" . $lang_id . "' ";
            $res = $this->ExecuteQuery($query, "update");
            echo "update";
            exit();
        }
    }
    #Copy Entire Directory
    /**
     * AdminManagement::copy_directory()
     * 
     * @param mixed $source
     * @param mixed $destination
     * @return
     */
    function copy_directory($source, $destination)
    {
        if (is_dir($source))
        {
            @mkdir($destination, 0777);
            $directory = dir($source);
            while (false !== ($readdirectory = $directory->read()))
            {
                if ($readdirectory == '.' || $readdirectory == '..')
                {
                    continue;
                }
                $PathDir = $source . '/' . $readdirectory;
                if (is_dir($PathDir))
                {
                    $this->copy_directory($PathDir, $destination . '/' . $readdirectory);
                    continue;
                }
                copy($PathDir, $destination . '/' . $readdirectory);
                @chmod($destination . '/' . $readdirectory, 0777);
            }
            $directory->close();
        } else
        {
            copy($source, $destination);
            @chmod($destination, 0777);
        }
    }
    /**
     * AdminManagement::remove_directory()
     * 
     * @param mixed $dir
     * @return
     */
    function remove_directory($dir)
    {
        if (is_dir($dir))
        {
            $objects = scandir($dir);
            foreach ($objects as $object)
            {
                if ($object != "." && $object != "..")
                {
                    if (filetype($dir . "/" . $object) == "dir")
                        $this->remove_directory($dir . "/" . $object);
                    else
                        unlink($dir . "/" . $object);
                }
            }
            reset($objects);
            rmdir($dir);
        }
    }
    /**
     * AdminManagement::list_directory_files()
     * 
     * @param mixed $dir
     * @return
     */
    function list_directory_files($dir)
    {
        if ($handle = opendir($dir))
        {
            /* This is the correct way to loop over the directory. */
            while (false !== ($file = readdir($handle)))
            {
                if ($file != "." && $file != ".." && $file != "lang.php" && $file != ".svn")
                {
                    #echo "$file\n";
                    //$file['langfilename'] = $file;
                    $files_list[] = $file;
                }
            }
            closedir($handle);
        }
        #echo "<pre>";print_r($files_list);echo "</pre>";
        return $files_list;
    }
    /**
     * AdminManagement::updateLanguageFiles()
     * 
     * @return
     */
    function updateLanguageFiles()
    {
        global $CFG;

        $lang_id    = $this->filterInput($_POST['langid']);

        $lang_code = $this->getValue('lang_code', $CFG['table']['language'],
            "lang_id = '" . $lang_id . "' ");
        $dirname = $CFG['site']['language_path'] . "/" . $lang_code;
        $filename = stripslashes($_POST['lfile']);
        $somecontent = stripslashes($_POST['langfilecontent']);

        if (is_dir($dirname) && file_exists($dirname . "/" . $filename))
        {

            // Let's make sure the file exists and is writable first.
            if (is_writable($dirname . "/" . $filename))
            {

                // In our example we're opening $filename in write mode.
                if (!$handle = fopen($dirname . "/" . $filename, 'w'))
                {
                    echo "Cannot open file ($filename)";
                    exit;
                }
                // Write $somecontent to our opened file.
                if (fwrite($handle, $somecontent) === false)
                {
                    echo "Cannot write to file ($filename)";
                    exit;
                }
                #echo "Success, wrote ($somecontent) to file ($filename)";

                fclose($handle);
            } else
            {
                echo 'The file ' . $filename . ' is not writable';
            }
        }
        echo 'success';
    }
    #--------------------------------------------------------------------------------
    #Import Language
    /**
     * AdminManagement::importLanguage()
     * 
     * @return
     */
    function importLanguage()
    {
        global $CFG;

        $tablename = $CFG['table']['language'];
        $dbfields = array('lang_name', 'lang_code');
        $filename = "languageManage.php";

        $this->importProcessCSV($tablename, $dbfields, $filename);
    }
    #----------------------------------------------------------------------------
    #Export Language
    /**
     * AdminManagement::exportLanguage()
     * 
     * @return
     */
    function exportLanguage()
    {
        global $CFG;

        #File name
        $file_name = "Language_" . date("dmY-His");
        $export_val_arr = array('lang_name', 'lang_code');

        #Table
        $selectfld = "lang_name, lang_code";
        $tablename = $CFG['table']['language'];
        $tblcondition = "ORDER BY lang_name ASC";
        $table_arr = array(
            $selectfld,
            $tablename,
            $tblcondition);

        #CSV
        $csv_heading_arr = array("Language Name", "Language Code");

        #Xls
        $xls_heading_arr = "Language Name\tLanguage Code";

        $this->exportProcessCSVXLS($file_name, $table_arr, $export_val_arr, $csv_heading_arr,
            $xls_heading_arr);
    }
    #--------------------------------------------------------------------------------

    #---------------------------Admin Customer Register-------------------------------

    /**
     * AdminManagement::customerRegister()
     * 
     * @return
     */
    function customerRegister()
    {
        global $CFG;

        $customer_name = $this->filterInput($_POST["customername"]);
        $customerlastname = $this->filterInput($_POST["customerlastname"]);
        $customer_street = $this->filterInput($_POST["customeraddress"]);
        $customer_buildtype = $this->filterInput($_POST["customerbuildtype"]);
        $customer_crossstreet = $this->filterInput($_POST["customercrossstreet"]);
        $customer_zip = $this->filterInput($_POST["customerzip"]);
        $customer_city = $this->filterInput($_POST["customercity"]);
        $customer_state = $this->filterInput($_POST["customerstate"]);
        $customer_phone = $this->filterInput($_POST["customerphone"]);
        $customer_landline = $this->filterInput($_POST["customerlandline"]);
        $customer_landmark = $this->filterInput($_POST["customerlandmark"]);
        $customer_addresslabel = $this->filterInput($_POST["customeraddresslabel"]);
        $customer_email = $this->filterInput($_POST["customeremail"]);
        //$customer_password 		= $this->filterInput($_POST["customerpassword"]);
        //$seourl    = $this->seoUrl($_POST['languagename']);

        $customer_password = $this->encrypt_password_md5($this->filterInput($_POST["customerpassword"]));

        $noofrows = $this->getNumvalues($CFG['table']['customer'], "customer_email='" .
            $customer_email . "' ");

        if ($noofrows != 0)
        {
            echo "exist";
            exit();
        } else
        {

            $query = "INSERT INTO 
								" . $CFG['table']['customer'] . " 
							SET 
								customer_name   		= '" . $customer_name . "',
								customer_lastname		= '" . $customerlastname . "',
								customer_street 		= '" . $customer_street . "',
								customer_buildtype 		= '" . $customer_buildtype . "',
								customer_crossstreet	= '" . $customer_crossstreet . "',
								customer_zip 			= '" . $customer_zip . "',
								customer_city 			= '" . $customer_city . "',
								customer_state 			= '" . $customer_state . "',
								customer_phone 			= '" . $customer_phone . "',
								customer_landline 		= '" . $customer_landline . "',
								customer_landmark 		= '" . $customer_landmark . "',
								customer_addresslabel 	= '" . $customer_addresslabel . "',
								customer_email 			= '" . $customer_email . "',
								customer_password 		= '" . $customer_password . "',
								addeddate 				= '" . CUR_TIME . "'";
            $res = $this->ExecuteQuery($query, "insert");
            echo "insert";
            exit();
        }

    }
    #----------------------------------------------------------------------------------------------------------------------------
    #customer Edit
    /**
     * AdminManagement::cutomerEdit()
     * 
     * @return
     */
    function cutomerEdit()
    {
        global $CFG;

        $customerid = $this->filterInput($_POST['customerid']);
        $customer_name = $this->filterInput($_POST["customername"]);
        $customerlastname = $this->filterInput($_POST["customerlastname"]);
        $customer_street = $this->filterInput($_POST["customeraddress"]);
        $customer_buildtype = $this->filterInput($_POST["customerbuildtype"]);
        $customer_crossstreet = $this->filterInput($_POST["customercrossstreet"]);
        $customer_zip = $this->filterInput($_POST["customerzip"]);
        $customer_city = $this->filterInput($_POST["customercity"]);
        $customer_state = $this->filterInput($_POST["customerstate"]);
        $customer_phone = $this->filterInput($_POST["customerphone"]);
        $customer_landline = $this->filterInput($_POST["customerlandline"]);
        $customer_landmark = $this->filterInput($_POST["customerlandmark"]);
        $customer_addresslabel = $this->filterInput($_POST["customeraddresslabel"]);
        $customer_email = $this->filterInput($_POST["customeremail"]);
        //$customer_password 		= $this->filterInput($_POST["customerpassword"]);
        //$seourl    = $this->seoUrl($_POST['statename']);

        $noforows = $this->getNumvalues($CFG['table']['customer'], "customer_email = '" .
            $customer_email . "' AND  customer_id != '" . $customerid . "'");
        if ($noforows != 0)
        {
            echo "exist";
            exit();
        } else
        {

            $query = "UPDATE 
							" . $CFG['table']['customer'] . " 
						SET 	
							customer_name   		= '" . $customer_name . "',
							customer_lastname		= '" . $customerlastname . "',
							customer_street 		= '" . $customer_street . "',
							customer_buildtype 		= '" . $customer_buildtype . "',
							customer_crossstreet	= '" . $customer_crossstreet . "',
							customer_zip 			= '" . $customer_zip . "',
							customer_city 			= '" . $customer_city . "',
							customer_state 			= '" . $customer_state . "',
							customer_phone 			= '" . $customer_phone . "',
							customer_landline 		= '" . $customer_landline . "',
							customer_landmark 		= '" . $customer_landmark . "',
							customer_addresslabel 	= '" . $customer_addresslabel . "',
							customer_email 			= '" . $customer_email . "'			
					   WHERE 	
                            customer_id 			= '" . $customerid . "' ";
            $res = $this->ExecuteQuery($query, "update");
            echo "update";
            exit();
        }

    }

    #customer list
    /**
     * AdminManagement::customerDetailList()
     * 
     * @return
     */
    function customerDetailList()
    {
        global $CFG, $admin_smarty;

        $req_keyword        = $this->filterInput($_REQUEST['keyword']);

        #echo "<pre>";print_r($_REQUEST);echo "</pre>";

        if (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'nasc')
        {
            $sort = " ORDER BY customer_name ASC";
            $fields .= "&sortby=" . $_REQUEST['sortby'];
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'ndesc')
        {
            $sort = " ORDER BY customer_name DESC";
            $fields .= "&sortby=" . $_REQUEST['sortby'];
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'easc')
        {
            $sort = " ORDER BY customer_email ASC";
            $fields .= "&sortby=" . $_REQUEST['sortby'];
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'edesc')
        {
            $sort = " ORDER BY customer_email DESC";
            $fields .= "&sortby=" . $_REQUEST['sortby'];
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'pasc')
        {
            $sort = " ORDER BY customer_phone ASC";
            $fields .= "&sortby=" . $_REQUEST['sortby'];
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'pdesc')
        {
            $sort = " ORDER BY customer_phone DESC";
            $fields .= "&sortby=" . $_REQUEST['sortby'];
        }
         /*elseif(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'zasc'){
        $sort = " ORDER BY customer_zip ASC";
        $fields .= "&sortby=".$_REQUEST['sortby'];
        }elseif(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'zdesc'){
        $sort = " ORDER BY customer_zip DESC";
        $fields .= "&sortby=".$_REQUEST['sortby'];
        }*/  else
        {
            $sort = " ORDER BY customer_name ASC";
        }

        #$sort = " ORDER BY customer_name ASC";

        #Status
        if (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'active')
        {
            $condition .= " AND status = '1' ";
            $fields .= "&sortby=" . $_REQUEST['sortby'];
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'deactive')
        {
            $condition .= " AND status = '0' ";
            $fields .= "&sortby=" . $_REQUEST['sortby'];
        }elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'pending')
        {
            $condition .= " AND status = '2' ";
            $fields .= "&sortby=" . $_REQUEST['sortby'];
        }

        if (isset($_REQUEST['limit']) && !empty($_REQUEST['limit']) && ($_REQUEST['limit'] !=
            "all"))
        {
            $limit = $_REQUEST['limit'];
            $fields .= "&limit=$_REQUEST[limit]";
        } else
        {
            $limit = PAGELIMIT;
        }

        $page = $_REQUEST['page'];
        if ($page == 0)
            $page = 1;
        if ($page)
            $start = ($page - 1) * $limit;
        else
            $start = 0;

        if (!empty($_REQUEST['limit']) && ($_REQUEST['limit'] == "all"))
        {
            $sql_lim = $this->filterInput($_REQUEST['limit']);
        } else
        {
            $sql_lim = "$start, $limit";
        }

        #Keyword
        if (isset($req_keyword) && !empty($req_keyword))
        {
            $keyword = "&keyword=$_REQUEST[keyword]";
            $condition .= "AND ( customer_name LIKE '%" . addslashes($req_keyword) .
                "%' OR  customer_email LIKE '%" . addslashes($req_keyword) .
                "%' OR  customer_phone LIKE '%" . addslashes($req_keyword) .
                "%' OR  customer_zip LIKE '%" . addslashes($req_keyword) . "%' ) ";
            $fields .= "&keyword=$_REQUEST[keyword]";
        }
        $condition .= " AND delete_status = 'No' ";
        $sql_sel = "SELECT customer_id, customer_name, customer_street, customer_buildtype, customer_crossstreet, customer_zip, customer_city, customer_state, customer_phone, customer_addresslabel, customer_email, customer_password,status, addeddate FROM " .
            $CFG['table']['customer'] . " WHERE customer_id IS NOT NULL $condition $sort";
        /*	$sql_sel = "SELECT customer_id, customer_name, customer_street, customer_buildtype, customer_crossstreet, customer_zip, customer_city, customer_state, customer_phone, customer_addresslabel, customer_email, customer_password,status, addeddate FROM ".$CFG['table']['customer']." WHERE customer_id IS NOT NULL $condition $sort";*/

        #echo $sql_sel;
        $total_pages = $this->ExecuteQuery($sql_sel, 'norows');

        $targetpage = "customerManage.php";
        $next_page = $this->make_page($targetpage, $total_pages, $limit, $page, $fields);
        $sql_limit = $sql_sel . " LIMIT " . $sql_lim;
        $result = mysqli_query($this->DBCONN,$sql_limit) or die(mysqli_error($this->DBCONN));
        $cnt = 1;
        while ($row_seller = mysqli_fetch_array($result))
        {
            $row_seller['no_order_cnt'] = $this->getNumValues($CFG['table']['order'],
                "customer_id='" . $this->filterInput($row_seller['customer_id']) . "' AND delete_status = 'No' ");
            $row_seller['sno'] = (($page - 1) * $limit) + $cnt . ".";
            $expmail = explode('@', $row_seller['customer_email']);
            $row_seller['customer_email'] = "********@" . $expmail[1];

            $categoryList[] = $row_seller;
            $cnt++;
        }
        //echo "<pre>";print_r($categoryList);echo "</pre>";
        #From & To Records
        if ($page == 1)
        {
            $fromRecords = 1;
            $toRecords = $limit;
            if ($toRecords >= $total_pages)
                $toRecords = $total_pages;
        } else
        {
            $fromRecords = $start + 1;
            $toRecords = $start + $limit;
            if ($toRecords >= $total_pages)
                $toRecords = $total_pages;
        }


        $admin_smarty->assign("tablename", $CFG['table']['customer']);
        $admin_smarty->assign("whereField", 'customer_id');
        $admin_smarty->assign("fieldname", 'status');
        $admin_smarty->assign("word", 'Customer');
        $admin_smarty->assign("filename", 'customerManage.php');
        $admin_smarty->assign("page", $page);

        $admin_smarty->assign("totalRecords", $total_pages);
        $admin_smarty->assign("fromRecords", $fromRecords);
        $admin_smarty->assign("toRecords", $toRecords);
        $admin_smarty->assign("limit", $limit);


        $admin_smarty->assign("customer_list", $categoryList);
        //$admin_smarty->assign("customer_zipcode", $customer_zipcode);
        $admin_smarty->assign("pagination", $next_page);


    }
    #--------------------------------------------------------------------------------------------------------------------
    #customer list
    /**
     * AdminManagement::customerDeleteList()
     * 
     * @return
     */
    function customerDeleteList()
    {
        global $CFG, $admin_smarty;

        $req_keyword        = $this->filterInput($_REQUEST['keyword']);

        #echo "<pre>";print_r($_REQUEST);echo "</pre>";

        if (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'nasc')
        {
            $sort = " ORDER BY customer_name ASC";
            $fields .= "&sortby=" . $_REQUEST['sortby'];
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'ndesc')
        {
            $sort = " ORDER BY customer_name DESC";
            $fields .= "&sortby=" . $_REQUEST['sortby'];
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'easc')
        {
            $sort = " ORDER BY customer_email ASC";
            $fields .= "&sortby=" . $_REQUEST['sortby'];
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'edesc')
        {
            $sort = " ORDER BY customer_email DESC";
            $fields .= "&sortby=" . $_REQUEST['sortby'];
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'pasc')
        {
            $sort = " ORDER BY customer_phone ASC";
            $fields .= "&sortby=" . $_REQUEST['sortby'];
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'pdesc')
        {
            $sort = " ORDER BY customer_phone DESC";
            $fields .= "&sortby=" . $_REQUEST['sortby'];
        }
         /*elseif(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'zasc'){
        $sort = " ORDER BY customer_zip ASC";
        $fields .= "&sortby=".$_REQUEST['sortby'];
        }elseif(isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'zdesc'){
        $sort = " ORDER BY customer_zip DESC";
        $fields .= "&sortby=".$_REQUEST['sortby'];
        }*/  else
        {
            $sort = " ORDER BY customer_name ASC";
        }

        #$sort = " ORDER BY customer_name ASC";

        #Status
        if (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'active')
        {
            $condition .= " AND status = '1' ";
            $fields .= "&sortby=" . $_REQUEST['sortby'];
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'deactive')
        {
            $condition .= " AND status = '0' ";
            $fields .= "&sortby=" . $_REQUEST['sortby'];
        }

        if (isset($_REQUEST['limit']) && !empty($_REQUEST['limit']) && ($_REQUEST['limit'] !=
            "all"))
        {
            $limit = $_REQUEST['limit'];
            $fields = "&limit=$_REQUEST[limit]";
        } else
        {
            $limit = PAGELIMIT;
        }

        $page = $_REQUEST['page'];
        if ($page == 0)
            $page = 1;
        if ($page)
            $start = ($page - 1) * $limit;
        else
            $start = 0;

        if (!empty($_REQUEST['limit']) && ($_REQUEST['limit'] == "all"))
        {
            $sql_lim = $this->filterInput($_REQUEST['limit']);
        } else
        {
            $sql_lim = "$start, $limit";
        }

        #Keyword
        if (isset($req_keyword) && !empty($req_keyword))
        {
            $keyword = "&keyword=$_REQUEST[keyword]";
            $condition .= "AND ( customer_name LIKE '%" . addslashes($req_keyword) .
                "%' OR  customer_email LIKE '%" . addslashes($req_keyword) .
                "%' OR  customer_phone LIKE '%" . addslashes($req_keyword) .
                "%' OR  customer_zip LIKE '%" . addslashes($req_keyword) . "%' ) ";
            $fields .= "&keyword=$_REQUEST[keyword]";
        }

        $sql_sel = "SELECT customer_id, customer_name, customer_street, customer_buildtype, customer_crossstreet, customer_zip, customer_city, customer_state, customer_phone, customer_addresslabel, customer_email, customer_password,status, addeddate FROM " .
            $CFG['table']['customer'] .
            " WHERE delete_status = 'Yes' AND customer_id IS NOT NULL $condition $sort";
        /*	$sql_sel = "SELECT customer_id, customer_name, customer_street, customer_buildtype, customer_crossstreet, customer_zip, customer_city, customer_state, customer_phone, customer_addresslabel, customer_email, customer_password,status, addeddate FROM ".$CFG['table']['customer']." WHERE customer_id IS NOT NULL $condition $sort";*/

        //echo $sql_sel;
        $total_pages = $this->ExecuteQuery($sql_sel, 'norows');

        $targetpage = "customerDeleteManage.php";
        $next_page = $this->make_page($targetpage, $total_pages, $limit, $page, $fields);
        $sql_limit = $sql_sel . " LIMIT " . $sql_lim;
        $result = mysqli_query($this->DBCONN,$sql_limit) or die(mysqli_error($this->DBCONN));
        $cnt = 1;
        while ($row_seller = mysqli_fetch_array($result))
        {
             
            $row_seller['sno'] = (($page - 1) * $limit) + $cnt . ".";
            $categoryList[] = $row_seller;
            
            $cnt++;
        }

       
        #From & To Records
        if ($page == 1)
        {
            $fromRecords = 1;
            $toRecords = $limit;
            if ($toRecords >= $total_pages)
                $toRecords = $total_pages;
        } else
        {
            $fromRecords = $start + 1;
            $toRecords = $start + $limit;
            if ($toRecords >= $total_pages)
                $toRecords = $total_pages;
        }


        $admin_smarty->assign("tablename", $CFG['table']['customer']);
        $admin_smarty->assign("whereField", 'customer_id');
        $admin_smarty->assign("fieldname", 'status');
        $admin_smarty->assign("word", 'Customer');
        $admin_smarty->assign("filename", 'customerManage.php');
        $admin_smarty->assign("page", $page);

        $admin_smarty->assign("totalRecords", $total_pages);
        $admin_smarty->assign("fromRecords", $fromRecords);
        $admin_smarty->assign("toRecords", $toRecords);
        $admin_smarty->assign("limit", $limit);


        $admin_smarty->assign("customer_list", $categoryList);
        //$admin_smarty->assign("customer_zipcode", $customer_zipcode);
        $admin_smarty->assign("pagination", $next_page);


    }
    #--------------------------------------------------------------------------------------------------------------------
    #Import Customer
    /**
     * AdminManagement::importCustomer()
     * 
     * @return
     */
    function importCustomer()
    {
        global $CFG;

        $tablename = $CFG['table']['customer'];
        $dbfields = array(
            'customer_name',
            'customer_street',
            'customer_buildtype',
            'customer_crossstreet',
            'customer_zip',
            'customer_city',
            'customer_state',
            'customer_phone',
            'customer_addresslabel',
            'customer_email',
            'customer_password');
        $filename = "customerManage.php";

        $this->importProcessCSV($tablename, $dbfields, $filename);
    }
    #----------------------------------------------------------------------------
    #Export Customer
    /**
     * AdminManagement::exportCustomer()
     * 
     * @return
     */
    function exportCustomer()
    {
        global $CFG;

        #File name
        $file_name = "Customer_" . date("dmY-His");
        $export_val_arr = array(
            'customer_name',
            'customer_street',
            'customer_buildtype',
            'customer_crossstreet',
            'customer_zip',
            'customer_city',
            'customer_state',
            'customer_phone',
            'customer_addresslabel',
            'customer_email',
            'customer_password');

        #Table
        $selectfld = "customer_name, customer_street, customer_buildtype, customer_crossstreet, customer_zip, customer_city, customer_state, customer_phone, customer_addresslabel, customer_email, customer_password";
        $tablename = $CFG['table']['customer'];
        $tblcondition = "status = '1' AND delete_status = 'No' ORDER BY customer_name ASC";
        $table_arr = array(
            $selectfld,
            $tablename,
            $tblcondition);

        #CSV
        $csv_heading_arr = array(
            "Customer Name",
            "Customer StreetAddress",
            "Customer Building",
            "Customer Crossstreet",
            "Customer Zip",
            "Customer City",
            "Customer State",
            "Customer Phone",
            "Customer AddressLabel",
            "Customer Email",
            "Customer Password");

        #Xls
        $xls_heading_arr = "Customer Name\tCustomer StreetAddress\tCustomer Building\tCustomer Crossstreet\tCustomer Zip\tCustomer City\tCustomer State\tCustomer Phone\tCustomer AddressLabel\tCustomer Email\tCustomer Password";

        $this->exportProcessCSVXLS($file_name, $table_arr, $export_val_arr, $csv_heading_arr,
            $xls_heading_arr);
    }
    #--------------------------------------------------------------------------------
    #---------------------------------------------------------------------------------
    #State Management
    #--------------------------------------------------------------------------------
    #Add new state name
    /**
     * AdminManagement::stateNameAdd()
     * 
     * @return
     */
    function stateNameAdd()
    {
        global $CFG;

        $statecode = $this->filterInput($_POST["statecode"]);
        $statename = $this->filterInput($_POST["statename"]);
        $seourl = $this->seoUrl($_POST['statename']);

        $noofrows = $this->getNumvalues($CFG['table']['state'], "statecode='" . $statecode .
            "' AND statename='" . $statename . "' ");

        if ($noofrows != 0)
        {
            echo "exist";
            exit();
        } else
        {
            $query = "INSERT INTO " . $CFG['table']['state'] . " SET statecode='" . $statecode .
                "', statename='" . $statename . "',state_seourl = '" . $seourl .
                "',addeddate = '" . CUR_TIME . "'";
            $res = $this->ExecuteQuery($query, "insert");
            echo "insert";
            exit();
        }
    }


    #---------------------------------------------------------------------------------------
    #state List
    /**
     * AdminManagement::stateNameList()
     * 
     * @return
     */
    function stateNameList()
    {
        global $CFG, $admin_smarty;

        $req_keyword        = $this->filterInput($_REQUEST['keyword']);

        #echo "<pre>";print_r($_GET);echo "</pre>";

        if (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'sasc')
        {
            $sort = " ORDER BY statecode ASC";
            $fields .= "&sortby=" . $_REQUEST['sortby'];
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'sdesc')
        {
            $sort = " ORDER BY statecode DESC";
            $fields .= "&sortby=" . $_REQUEST['sortby'];
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'snasc')
        {
            $sort = " ORDER BY statename ASC";
            $fields .= "&sortby=" . $_REQUEST['sortby'];
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'sndesc')
        {
            $sort = " ORDER BY statename DESC";
            $fields .= "&sortby=" . $_REQUEST['sortby'];
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'iasc')
        {
            $sort = " ORDER BY state_id ASC";
            $fields .= "&sortby=" . $_REQUEST['sortby'];
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'idesc')
        {
            $sort = " ORDER BY state_id DESC";
            $fields .= "&sortby=" . $_REQUEST['sortby'];
        } else
        {
            $sort = " ORDER BY statecode ASC";
        }

        #Status
        if (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'active')
        {
            $condition .= " AND state_status = '1' ";
            $fields .= "&sortby=" . $_REQUEST['sortby'];
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'deactive')
        {
            $condition .= " AND state_status = '0' ";
            $fields .= "&sortby=" . $_REQUEST['sortby'];
        }

        if (isset($_REQUEST['limit']) && !empty($_REQUEST['limit']) && ($_REQUEST['limit'] !=
            "all"))
        {
            $limit = $_REQUEST['limit'];
            $fields = "&limit=$_REQUEST[limit]";
        } else
        {
            $limit = PAGELIMIT;
        }

        $page = $_REQUEST['page'];
        if ($page == 0)
            $page = 1;
        if ($page)
            $start = ($page - 1) * $limit;
        else
            $start = 0;

        if (!empty($_REQUEST['limit']) && ($_REQUEST['limit'] == "all"))
        {
            $sql_lim = $this->filterInput($_REQUEST['limit']);
        } else
        {
            $sql_lim = "$start, $limit";
        }

        #Keyword
        if (isset($req_keyword) && !empty($req_keyword))
        {
            $keyword = "&keyword=$_REQUEST[keyword]";
            $condition .= "AND ( statecode LIKE '%" . addslashes($req_keyword) .
                "%' OR  statename LIKE '%" . addslashes($req_keyword) . "%' ) ";
            $fields .= "&keyword=$_REQUEST[keyword]";
        }


        $sql_sel = "SELECT state_id, statecode, statename, state_status, addeddate FROM " .
            $CFG['table']['state'] . " WHERE state_id IS NOT NULL $condition $sort";
        $total_pages = $this->ExecuteQuery($sql_sel, 'norows');

        $targetpage = "stateManage.php";
        $next_page = $this->make_page($targetpage, $total_pages, $limit, $page, $fields);
        $sql_limit = $sql_sel . " LIMIT " . $sql_lim;
        $result = mysqli_query($this->DBCONN,$sql_limit) or die(mysqli_error($this->DBCONN));
        $cnt = 1;
        while ($row_seller = mysqli_fetch_array($result))
        {
            $row_seller['sno'] = (($page - 1) * $limit) + $cnt . ".";
            $categoryList[] = $row_seller;
            $cnt++;
        }
        
        #update Seo Url
        $sel_seourl_num = $this->getNumValues($CFG['table']['state'],
            "state_seourl = ''");
        if ($sel_seourl_num > 0)
        {

            $sql_qry = " SELECT state_id, statename FROM " . $CFG['table']['state'] .
                " WHERE state_seourl = '' ";
            $res_qry = $this->ExecuteQuery($sql_qry, 'select');
            foreach ($res_qry as $key => $value)
            {
                $up_qry = " UPDATE " . $CFG['table']['state'] . " SET state_seourl ='" . $this->
                    seoUrl($res_qry[$key]['statename']) . "' WHERE state_id = '" . $this->filterInput($res_qry[$key]['state_id']) .
                    "' ";
                $up_res = $this->ExecuteQuery($up_qry, 'update');
            }
        }

        #From & To Records
        if ($page == 1)
        {
            $fromRecords = 1;
            $toRecords = $limit;
            if ($toRecords >= $total_pages)
                $toRecords = $total_pages;
        } else
        {
            $fromRecords = $start + 1;
            $toRecords = $start + $limit;
            if ($toRecords >= $total_pages)
                $toRecords = $total_pages;
        }


        $admin_smarty->assign("tablename", $CFG['table']['state']);
        $admin_smarty->assign("whereField", 'state_id');
        $admin_smarty->assign("fieldname", 'state_status');
        $admin_smarty->assign("word", 'State');
        $admin_smarty->assign("filename", 'stateManage.php');
        $admin_smarty->assign("page", $page);

        $admin_smarty->assign("totalRecords", $total_pages);
        $admin_smarty->assign("fromRecords", $fromRecords);
        $admin_smarty->assign("toRecords", $toRecords);
        $admin_smarty->assign("limit", $limit);


        $admin_smarty->assign("stateName_list", $categoryList);
        $admin_smarty->assign("pagination", $next_page);
    }
    #---------------------------------------------------------------------------------------
    #Edit state
    /**
     * AdminManagement::stateNameEdit()
     * 
     * @return
     */
    function stateNameEdit()
    {
        global $CFG;

        $stateid    = $this->filterInput($_POST['stateid']);
        $statecode  = $this->filterInput($_POST["statecode"]);
        $statename  = $this->filterInput($_POST["statename"]);
        $seourl     = $this->seoUrl($_POST['statename']);

        $noforows = $this->getNumvalues($CFG['table']['state'], "statecode = '$statecode' AND statename ='$statename' AND  state_id != '" .
            $stateid . "'");
        if ($noforows != 0)
        {
            echo "exist";
            exit();
        } else
        {
            $query = "UPDATE " . $CFG['table']['state'] . " SET statecode = '" . $statecode .
                "', statename ='" . $statename . "',state_seourl = '" . $seourl .
                "' WHERE state_id = '" . $stateid . "' ";
            $res = $this->ExecuteQuery($query, "update");
            echo "update";
            exit();
        }
    }
    #--------------------------------------------------------------------------------
    #Export state
    /**
     * AdminManagement::exportState()
     * 
     * @return
     */
    function exportState()
    {
        global $CFG;

        #File name
        $file_name = "State_" . date("dmY-His");
        $export_val_arr = array('statecode', 'statename');

        #Table
        $selectfld = "statecode, statename";
        $tablename = $CFG['table']['state'];
        $tblcondition = "statecode != '' ORDER BY statecode ASC";
        $table_arr = array(
            $selectfld,
            $tablename,
            $tblcondition);

        #CSV
        $csv_heading_arr = array("State Code", "State Name");

        #Xls
        $xls_heading_arr = "State Code\tState Name";

        $this->exportProcessCSVXLS($file_name, $table_arr, $export_val_arr, $csv_heading_arr,
            $xls_heading_arr);
    }
    #--------------------------------------------------------------------------------
    #Import state
    /**
     * AdminManagement::importState()
     * 
     * @return
     */
    function importState()
    {
        global $CFG;

        $tablename = $CFG['table']['state'];
        $dbfields = array('statecode', 'statename');
        $filename = "stateManage.php";

        $this->importProcessCSV($tablename, $dbfields, $filename);
    }
    #--------------------------------------------------------------------------------
    #City Management
    #--------------------------------------------------------------------------------
    #Add new city name
    /**
     * AdminManagement::cityNameAdd()
     * 
     * @return
     */
    function cityNameAdd()
    {
        global $CFG;

        $statename = $this->filterInput($_POST["statename"]);
        $cityname = $this->filterInput($_POST["cityname"]);
        $seourl = $this->seoUrl($_POST["cityname"]);

        if ($statename == '')
        {
            $statename = $this->filterInput($_POST["stecode"]);
        }

        $noofrows = $this->getNumvalues($CFG['table']['city'], "statecode='" . $statename .
            "' AND cityname='" . $cityname . "' ");

        if ($noofrows != 0)
        {
            echo "exist";
            exit();
        } else
        {
            $query = "INSERT INTO " . $CFG['table']['city'] . " SET statecode='" . $statename .
                "',cityname='" . $cityname . "',city_seourl = '" . $seourl . "',addeddate ='" .
                CUR_TIME . "'";
            $res = $this->ExecuteQuery($query, "insert");
            echo "insert";
            exit();
        }
    }
    #---------------------------------------------------------------------------------------
    #city List
    /**
     * AdminManagement::cityNameList()
     * 
     * @return
     */
    function cityNameList()
    {
        global $CFG, $admin_smarty;

        $req_keyword        = $this->filterInput($_REQUEST['keyword']);

        #sort by
        if (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'casc')
        {
            $sort = " ORDER BY cityname ASC";
            $fields .= "&sortby=" . $_REQUEST['sortby'];
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'cdesc')
        {
            $sort = " ORDER BY cityname DESC";
            $fields .= "&sortby=" . $_REQUEST['sortby'];
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'iasc')
        {
            $sort = " ORDER BY city_id ASC";
            $fields .= "&sortby=" . $_REQUEST['sortby'];
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'idesc')
        {
            $sort = " ORDER BY city_id DESC";
            $fields .= "&sortby=" . $_REQUEST['sortby'];
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'sasc')
        {
            $sort = " ORDER BY statecode ASC";
            $fields .= "&sortby=" . $_REQUEST['sortby'];
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'sdesc')
        {
            $sort = " ORDER BY statecode DESC";
            $fields .= "&sortby=" . $_REQUEST['sortby'];
        } else
        {
            $sort = " ORDER BY city_id DESC";
        }

        #Status
        if (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'active')
        {
            $condition .= " AND city_status = '1' ";
            $fields .= "&sortby=" . $_REQUEST['sortby'];
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'deactive')
        {
            $condition .= " AND city_status = '0' ";
            $fields .= "&sortby=" . $_REQUEST['sortby'];
        }

        if (isset($_REQUEST['limit']) && !empty($_REQUEST['limit']) && ($_REQUEST['limit'] !=
            "all"))
        {
            $limit = $_REQUEST['limit'];
            $fields = "&limit=$_REQUEST[limit]";
        } else
        {
            $limit = PAGELIMIT;
        }

        $page = $_REQUEST['page'];
        if ($page == 0)
            $page = 1;
        if ($page)
            $start = ($page - 1) * $limit;
        else
            $start = 0;

        if (!empty($_REQUEST['limit']) && ($_REQUEST['limit'] == "all"))
        {
            $sql_lim = $this->filterInput($_REQUEST['limit']);
        } else
        {
            $sql_lim = "$start, $limit";
        }

        #Keyword
        if (isset($req_keyword) && !empty($req_keyword))
        {
            $keyword = "&keyword=$_REQUEST[keyword]";
            $condition .= "AND (cityname LIKE '%" . addslashes($req_keyword) .
                "%' ) ";
            $fields .= "&keyword=$_REQUEST[keyword]";
        }

        if (isset($_GET['sc']) && !empty($_GET['sc']))
        {
            $condition .= " AND statecode = '" . $this->filterInput($_GET['sc']) . "' ";
        }

        $sql_sel = "SELECT city_id, statecode, cityname, city_status, addeddate FROM " .
            $CFG['table']['city'] . " WHERE city_id IS NOT NULL $condition $sort ";
        $total_pages = $this->ExecuteQuery($sql_sel, 'norows');

        $targetpage = "cityManage.php";
        $next_page = $this->make_page($targetpage, $total_pages, $limit, $page, $fields);
        $sql_limit = $sql_sel . " LIMIT " . $sql_lim;

        $result = mysqli_query($this->DBCONN,$sql_limit) or die(mysqli_error($this->DBCONN));
        $cnt = 1;
        while ($row_seller = mysqli_fetch_array($result))
        {
            $row_seller['sno'] = (($page - 1) * $limit) + $cnt . ".";
            $row_seller['addeddate'] = $this->setDateFormatWithOutTime($row_seller['addeddate']);
            $cityList[] = $row_seller;
            $cnt++;
        }

        #update Seo Url
        $sel_seourl_num = $this->getNumValues($CFG['table']['city'], "city_seourl = ''");
        if ($sel_seourl_num > 0)
        {

            $sql_qry = " SELECT city_id, cityname FROM " . $CFG['table']['city'] .
                " WHERE city_seourl = '' ";
            $res_qry = $this->ExecuteQuery($sql_qry, 'select');
            foreach ($res_qry as $key => $value)
            {
                $up_qry = " UPDATE " . $CFG['table']['city'] . " SET city_seourl ='" . $this->
                    seoUrl($res_qry[$key]['cityname']) . "' WHERE city_id = '" . $this->filterInput($res_qry[$key]['city_id']) .
                    "' ";
                $up_res = $this->ExecuteQuery($up_qry, 'update');
            }
        }

        #From & To Records
        if ($page == 1)
        {
            $fromRecords = 1;
            $toRecords = $limit;
            if ($toRecords >= $total_pages)
                $toRecords = $total_pages;
        } else
        {
            $fromRecords = $start + 1;
            $toRecords = $start + $limit;
            if ($toRecords >= $total_pages)
                $toRecords = $total_pages;
        }

        #echo "<pre>";print_r($cityList);echo "</pre>";
        $admin_smarty->assign("tablename", $CFG['table']['city']);
        $admin_smarty->assign("whereField", 'city_id');
        $admin_smarty->assign("fieldname", 'city_status');
        $admin_smarty->assign("word", 'City');
        $admin_smarty->assign("filename", 'cityManage.php');
        $admin_smarty->assign("page", $page);

        $admin_smarty->assign("totalRecords", $total_pages);
        $admin_smarty->assign("fromRecords", $fromRecords);
        $admin_smarty->assign("toRecords", $toRecords);
        $admin_smarty->assign("limit", $limit);


        $admin_smarty->assign("cityname_list", $cityList);
        $admin_smarty->assign("pagination", $next_page);
    }
    #---------------------------------------------------------------------------------------
    #Edit state
    /**
     * AdminManagement::cityNameEdit()
     * 
     * @return
     */
    function cityNameEdit()
    {
        global $CFG;

        $statename = $this->filterInput($_POST["statename"]);
        $cityname = $this->filterInput($_POST["cityname"]);
        $seourl = $this->seoUrl($_POST["cityname"]);

        if ($statename == '')
        {
            $statename = $this->filterInput($_POST["stecode"]);
        }

        $noforows = $this->getNumvalues($CFG['table']['city'], "statecode ='" . $statename .
            "' AND cityname ='" . $cityname . "' AND city_id != '" . $this->filterInput($_POST['cityid']) . "'");
        if ($noforows != 0)
        {
            echo "exist";
            exit();
        } else
        {
            $query = "UPDATE " . $CFG['table']['city'] . " SET statecode ='" . $statename .
                "',cityname ='" . $cityname . "',city_seourl = '" . $seourl .
                "' WHERE city_id = '" . $this->filterInput($_POST['cityid']) . "' ";
            $res = $this->ExecuteQuery($query, "update");
            echo "update";
            exit();
        }
    }
    #--------------------------------------------------------------------------------
    #Export Faq
    /**
     * AdminManagement::exportCity()
     * 
     * @return
     */
    function exportCity()
    {
        global $CFG;

        #File name
        $file_name = "City_" . date("dmY-His");
        $export_val_arr = array('statecode', 'cityname');

        #Table
        $selectfld = "statecode, cityname";
        $tablename = $CFG['table']['city'];
        $tblcondition = "city_id IS NOT NULL ORDER BY statecode ASC";
        $table_arr = array(
            $selectfld,
            $tablename,
            $tblcondition);

        #CSV
        $csv_heading_arr = array("State Code", "City Name");

        #Xls
        $xls_heading_arr = "State Code\tCity Name";

        $this->exportProcessCSVXLS($file_name, $table_arr, $export_val_arr, $csv_heading_arr,
            $xls_heading_arr);
    }
    #--------------------------------------------------------------------------------
    #Import Faq
    /**
     * AdminManagement::importCity()
     * 
     * @return
     */
    function importCity()
    {
        global $CFG;

        $tablename = $CFG['table']['city'];
        $dbfields = array('statecode', 'cityname');
        $filename = "cityManage.php";

        $this->importProcessCSV($tablename, $dbfields, $filename);
    }
    #--------------------------------------------------------------------------------
    #Zipcode Management
    #--------------------------------------------------------------------------------
    #Add new zip code
    /**
     * AdminManagement::newZipcodeAdd()
     * 
     * @return
     */
    function newZipcodeAdd()
    {
        global $CFG;

        $statename = $this->filterInput($_POST["statename"]);
        $cityname = $this->filterInput($_POST["cityname"]);
        $zipcode = $this->filterInput($_POST["zipcode"]);
        $areaname = $this->filterInput($_POST["areaname"]);
        $seourl = $this->seoUrl($_POST['areaname']);

        if ($statename == '' && $cityname == '')
        {
            $statename = $this->filterInput($_POST["stecode"]);
            $cityname = $this->filterInput($_POST["cid"]);
        }

        $noofrows = $this->getNumvalues($CFG['table']['zipcode'], "statecode = '" . $statename .
            "' AND cityid = '" . $cityname . "' AND zipcode = '" . $zipcode .
            "' AND areaname = '" . $areaname . "' ");

        if ($noofrows != 0)
        {
            echo "exist";
            exit();
        } else
        {
            $query = "INSERT INTO " . $CFG['table']['zipcode'] . " SET statecode = '" . $statename .
                "',cityid = '" . $cityname . "',zipcode = '" . $zipcode . "', areaname = '" . $areaname .
                "', area_seourl = '" . $seourl . "', addeddate = '" . CUR_TIME . "'";
            $res = $this->ExecuteQuery($query, "insert");
            echo "insert";
            exit();
        }
    }
    #---------------------------------------------------------------------------------------
    #zipcode List
    /**
     * AdminManagement::zipcodeList()
     * 
     * @return
     */
    function zipcodeList()
    {
        global $CFG, $admin_smarty;

        $req_keyword        = $this->filterInput($_REQUEST['keyword']);

        #sort by zipcode
        if (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'zasc')
        {
            $sort = " ORDER BY zipcode ASC";
            $fields .= "&sortby=zasc";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'zdesc')
        {
            $sort = " ORDER BY zipcode DESC";
            $fields .= "&sortby=zdesc";
        } else
            if (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'aasc')
            {
                $sort = " ORDER BY areaname ASC";
                $fields .= "&sortby=aasc";
            } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'adesc')
            {
                $sort = " ORDER BY areaname DESC";
                $fields .= "&sortby=adesc";
            } else
                if (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'sasc')
                {
                    $sort = " ORDER BY statecode ASC";
                    $fields .= "&sortby=sasc";
                } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'sdesc')
                {
                    $sort = " ORDER BY statecode DESC";
                    $fields .= "&sortby=sdesc";
                } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'iasc')
                {
                    $sort = " ORDER BY zipcode_id ASC";
                    $fields .= "&sortby=" . $_REQUEST['sortby'];
                } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'idesc')
                {
                    $sort = " ORDER BY zipcode_id DESC";
                    $fields .= "&sortby=" . $_REQUEST['sortby'];
                } else
                {
                    $sort = " ORDER BY zipcode ASC";
                }

                #Status
                if (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'active')
                {
                    $condition .= " AND zipcode_status = '1' ";
                    $fields .= "&sortby=" . $_REQUEST['sortby'];
                } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'deactive')
                {
                    $condition .= " AND zipcode_status = '0' ";
                    $fields .= "&sortby=" . $_REQUEST['sortby'];
                }

        if (isset($_REQUEST['limit']) && !empty($_REQUEST['limit']) && ($_REQUEST['limit'] !=
            "all"))
        {
            $limit = $_REQUEST['limit'];
            $fields = "&limit=$_REQUEST[limit]";
        } else
        {
            $limit = PAGELIMIT;
        }

        $page = $_REQUEST['page'];
        if ($page == 0)
            $page = 1;
        if ($page)
            $start = ($page - 1) * $limit;
        else
            $start = 0;

        if (!empty($_REQUEST['limit']) && ($_REQUEST['limit'] == "all"))
        {
            $sql_lim = $this->filterInput($_REQUEST['limit']);
        } else
        {
            $sql_lim = "$start, $limit";
        }

        #Keyword
        if (isset($req_keyword) && !empty($req_keyword))
        {
            $keyword = "&keyword=$_REQUEST[keyword]";
            $condition .= "AND zipcode LIKE '%" . addslashes($req_keyword) .
                "%' OR areaname LIKE '%" . addslashes($req_keyword) . "%' ";
            $fields .= "&keyword=$_REQUEST[keyword]";
        }

        if (isset($_GET['sc']) && !empty($_GET['sc']))
        {
            $condition .= " AND statecode = '" . $_GET['sc'] . "' ";
        }
        if (isset($_GET['cid']) && !empty($_GET['cid']))
        {
            $condition .= " AND cityid = '" . $_GET['cid'] . "' ";
        }

        $sql_sel = "SELECT zipcode_id, cityid, zipcode, statecode, areaname, zipcode_status, addeddate FROM " .
            $CFG['table']['zipcode'] . " WHERE zipcode_id IS NOT NULL $condition $sort";
        $total_pages = $this->ExecuteQuery($sql_sel, 'norows');

        $targetpage = "zipcodeManage.php";
        $next_page = $this->make_page($targetpage, $total_pages, $limit, $page, $fields);
        $sql_limit = $sql_sel . " LIMIT " . $sql_lim;
        $result = mysqli_query($this->DBCONN,$sql_limit) or die(mysqli_error($this->DBCONN));
        $cnt = 1;
        while ($row_seller = mysqli_fetch_array($result))
        {
            $row_seller['sno'] = (($page - 1) * $limit) + $cnt;
            //$row_seller['statecode'] = $this->GetValue("statecode",$CFG['table']['state'],"state_id = '".$row_seller['stateid']."'");
            $categoryList[] = $row_seller;
            $cnt++;
        }
        #update Seo Url
        $sel_seourl_num = $this->getNumValues($CFG['table']['zipcode'],
            "area_seourl = ''");
        if ($sel_seourl_num > 0)
        {

            $sql_qry = " SELECT zipcode_id,	areaname FROM " . $CFG['table']['zipcode'] .
                " WHERE area_seourl = '' ";
            $res_qry = $this->ExecuteQuery($sql_qry, 'select');
            foreach ($res_qry as $key => $value)
            {
                $up_qry = " UPDATE " . $CFG['table']['zipcode'] . " SET area_seourl ='" . $this->
                    seoUrl($res_qry[$key]['areaname']) . "' WHERE zipcode_id = '" . $this->filterInput($res_qry[$key]['zipcode_id']) .
                    "' ";
                $up_res = $this->ExecuteQuery($up_qry, 'update');
            }
        }

        #From & To Records
        if ($page == 1)
        {
            $fromRecords = 1;
            $toRecords = $limit;
            if ($toRecords >= $total_pages)
                $toRecords = $total_pages;
        } else
        {
            $fromRecords = $start + 1;
            $toRecords = $start + $limit;
            if ($toRecords >= $total_pages)
                $toRecords = $total_pages;
        }

        $admin_smarty->assign("tablename", $CFG['table']['zipcode']);
        $admin_smarty->assign("whereField", 'zipcode_id');
        $admin_smarty->assign("fieldname", 'zipcode_status');
        $admin_smarty->assign("word", 'Zipcode');
        $admin_smarty->assign("filename", 'zipcodeManage.php');
        $admin_smarty->assign("page", $page);

        $admin_smarty->assign("totalRecords", $total_pages);
        $admin_smarty->assign("fromRecords", $fromRecords);
        $admin_smarty->assign("toRecords", $toRecords);
        $admin_smarty->assign("limit", $limit);

        $admin_smarty->assign("zipcode_list", $categoryList);
        $admin_smarty->assign("pagination", $next_page);
    }
    #---------------------------------------------------------------------------------------
    #Edit zipcode
    /**
     * AdminManagement::zipcodeEdit()
     * 
     * @return
     */
    function zipcodeEdit()
    {
        global $CFG;

        $zipid = $this->filterInput($_POST['zipid']);
        $statename = $this->filterInput($_POST["statename"]);
        $cityname = $this->filterInput($_POST["cityname"]);
        $zipcode = $this->filterInput($_POST["zipcode"]);
        $areaname = $this->filterInput($_POST["areaname"]);
        $seourl = $this->seoUrl($_POST['areaname']);

        if ($statename == '' && $cityname == '')
        {
            $statename = $this->filterInput($_POST["stecode"]);
            $cityname = $this->filterInput($_POST["cid"]);
        }

        $noforows = $this->getNumvalues($CFG['table']['zipcode'], "statecode = '" . $statename .
            "' AND cityid = '" . $cityname . "' AND zipcode = '" . $zipcode .
            "' AND areaname ='" . $areaname . "' AND zipcode_id != '" . $zipid .
            "'");
        if ($noforows != 0)
        {
            echo "exist";
            exit();
        } else
        {
            $query = "UPDATE 
							" . $CFG['table']['zipcode'] . " 
					  	SET 
					  		statecode 	= '" . $statename . "',
							cityid 		= '" . $cityname . "',
							zipcode 	= '" . $zipcode . "', 
							areaname 	= '" . $areaname . "',
							area_seourl = '" . $seourl . "'
						WHERE 
							zipcode_id  = '" . $zipid . "' ";
            $res = $this->ExecuteQuery($query, "update");
            echo "update";
            exit();
        }
    }
    #--------------------------------------------------------------------------------
    #Export Main Category
    /**
     * AdminManagement::exportZipcode()
     * 
     * @return
     */
    function exportZipcode()
    {
        global $CFG;

        #File name
        $file_name = "Zipcode_" . date("dmY-His");
        $export_val_arr = array('zipcode', 'areaname');

        #Table
        $selectfld = "zipcode, areaname";
        $tablename = $CFG['table']['zipcode'];
        $tblcondition = "zipcode_id IS NOT NULL ORDER BY zipcode ASC";
        $table_arr = array(
            $selectfld,
            $tablename,
            $tblcondition);

        #CSV
        $csv_heading_arr = array("Zipcode", "Area Name");

        #Xls
        $xls_heading_arr = "Zipcode\tArea Name";

        $this->exportProcessCSVXLS($file_name, $table_arr, $export_val_arr, $csv_heading_arr,
            $xls_heading_arr);
    }
    #--------------------------------------------------------------------------------
    #Import Main Category
    /**
     * AdminManagement::importZipcode()
     * 
     * @return
     */
    function importZipcode()
    {
        global $CFG;

        $tablename = $CFG['table']['zipcode'];
        $dbfields = array(
            'zipcode',
            'areaname',
            'cityid',
            'statecode',
            'lat',
            'lon');
        $filename = "zipcodeManage.php";

        $this->importProcessCSV($tablename, $dbfields, $filename);
    }
    #--------------------------------------------------------------------------------
    #Index Page statics
    /**
     * AdminManagement::indexStatics()
     * 
     * @return
     */
    function indexStatics()
    {
        global $CFG, $admin_smarty;

        #Users.............................................
        #Total Users
        $currentmonth = date('m');
        $currentyear = date('Y');
        $day = date('l');
        $month = date('F');
        $date = date('j');

        $tot_user = $this->getNumvalues($CFG['table']['customer'], "delete_status = 'No'");
        $admin_smarty->assign("tot_user", $tot_user);

        #Active Users
        $active_user = $this->getNumvalues($CFG['table']['customer'], "status= '1' AND delete_status = 'No'");
        $admin_smarty->assign("active_user", $active_user);

        #Inactive Users
        $inactive_user = $this->getNumvalues($CFG['table']['customer'], "status= '0' AND delete_status = 'No'");
        $admin_smarty->assign("inactive_user", $inactive_user);

        #User joined this WEEK
        $thisweek_user = $this->getNumvalues($CFG['table']['customer'],
            "addeddate BETWEEN date_sub( '" . CUR_TIME . "' , INTERVAL 1 WEEK )AND '" .
            CUR_TIME . "'");
        $admin_smarty->assign("thisweek_user", $thisweek_user);

        #User joined this month
        $thismon_user = $this->getNumvalues($CFG['table']['customer'],
            "MONTH( addeddate ) = '" . $currentmonth . "' AND YEAR( addeddate )= '" . $currentyear .
            "' ");
        $admin_smarty->assign("thismon_user", $thismon_user);

        #User joined this year
        $thisyear_user = $this->getNumvalues($CFG['table']['customer'],
            "YEAR( addeddate )= '" . $currentyear . "' ");
        $admin_smarty->assign("thisyear_user", $thisyear_user);


        #Restaurants.............................................
        #Total Restaurants
        $tot_rest = $this->getNumvalues($CFG['table']['restaurant'],"restaurant_id != '' AND delete_status = 'No'");
        $admin_smarty->assign("tot_rest", $tot_rest);

        #Active Restaurants
        $active_rest = $this->getNumvalues($CFG['table']['restaurant'],
            "restaurant_status= '1' AND  delete_status = 'No'");
        $admin_smarty->assign("active_rest", $active_rest);

        #Inactive Restaurants
        $inactive_rest = $this->getNumvalues($CFG['table']['restaurant'],
            "restaurant_status= '0' AND delete_status = 'No'");
        $admin_smarty->assign("inactive_rest", $inactive_rest);

        #Pending Restaurants
        $pend_rest = $this->getNumvalues($CFG['table']['restaurant'],
            "restaurant_status= '2' AND delete_status = 'No'");
        $admin_smarty->assign("pend_rest", $pend_rest);

        #Restaurants joined this week
        $thisweek_rest = $this->getNumvalues($CFG['table']['restaurant'],
            "addeddate BETWEEN date_sub( '" . CUR_TIME . "' , INTERVAL 1 WEEK )AND '" .
            CUR_TIME . "'");
        $admin_smarty->assign("thisweek_rest", $thisweek_rest);

        #Restaurants joined this month
        $thismonth_rest = $this->getNumvalues($CFG['table']['restaurant'],
            "MONTH( addeddate ) = '" . $currentmonth . "' AND YEAR( addeddate )= '" . $currentyear .
            "' ");
        $admin_smarty->assign("thismonth_rest", $thismonth_rest);

        #Restaurants joined this year
        $thisyear_rest = $this->getNumvalues($CFG['table']['restaurant'],
            "YEAR( addeddate )= '" . $currentyear . "' ");
        $admin_smarty->assign("thisyear_rest", $thisyear_rest);
        $admin_smarty->assign("day", $day);
        $admin_smarty->assign("month", $month);
        $admin_smarty->assign("date", $date);
        $admin_smarty->assign("currentyear", $currentyear);


        #----------------------------- Total Order Details In admin Header ----------------------#
        #Total Order Count
        $tot_wholeorder = $this->getNumvalues($CFG['table']['order'],
            "status = 'completed' AND restaurant_id != '0'  ");
        $admin_smarty->assign("tot_wholeorder", $tot_wholeorder);
        #------------------------------------------------------------#
        #Total Order Sales
        $total_wholesalesprice = $this->getMultivalue("ordertotalprice", $CFG['table']['order'],
            "status = 'completed' AND restaurant_id != '0' ");


        if (is_array($total_wholesalesprice))
        {
            foreach ($total_wholesalesprice as $key => $value)
            {
                $totalwholesales[] = $total_wholesalesprice[$key]['ordertotalprice'];
            }
            if (!empty($totalwholesales))
            {
                $wholesales_val = str_replace(",", "", $totalwholesales);
                $wholesalesorder = array_sum($wholesales_val);
            }
            $admin_smarty->assign("total_wholesalesprice", $wholesalesorder);
        }
        #------------------------------------------------------------#
        #Commission
        $totalsalesprice = $this->getMultivalue("ordersubtotal,ordertotalprice,res_comm_price",
            $CFG['table']['order'], "status = 'completed' AND restaurant_id != '0' ");
        if (is_array($totalsalesprice))
        {
            foreach ($totalsalesprice as $key => $value)
            {
                $total[] = $totalsalesprice[$key]['ordersubtotal'];
                $commprice[] = $totalsalesprice[$key]['res_comm_price'];
                $ordertotal[] = $totalsalesprice[$key]['ordertotalprice'];
            }
        }
        if (!empty($total))
        {
            $sales = str_replace(",", "", $total);
            $salesprice = array_sum($sales);
        }
        if (!empty($commprice))
        {
            $commsales = str_replace(",", "", $commprice);
            $commsalesprice = array_sum($commsales);
        }
        if (!empty($ordertotal))
        {
            $ordtotal = str_replace(",", "", $ordertotal);
            $totalorderprice = array_sum($ordtotal);
        }

        $commission = $this->getValue("restaurant_commission", $CFG['table']['restaurant'],
            "restaurant_id = '" . $_SESSION['restaurantownerid'] . "'");
        //$commission = '5';
        #$total_comm_price =  ( $salesprice*($commission/100) );
        $total_comm_price = $commsalesprice;
        $remaining_price = $salesprice - $total_comm_price;
        if ($salesprice == 0)
        {
            $total_comm_price = 0;
            $remaining_price = 0;
        }
        $admin_smarty->assign("totalorderprice", number_format($totalorderprice, 2));
        $admin_smarty->assign("totalsalesprice", number_format($salesprice, 2));
        $admin_smarty->assign("totalsalesCommissionprice", number_format($total_comm_price,
            2));
        $admin_smarty->assign("remainingprice", number_format($remaining_price, 2));
        $admin_smarty->assign("commission", $commission);
        #------------------------------------------------------------#

    }
    #---------------------------------------------------------------------------------------------
    #Dashboard Details
    /**
     * AdminManagement::restaurantDashboardTodayOrders()
     * 
     * @return
     */
    function restaurantDashboardTodayOrders()
    {
        global $CFG, $admin_smarty;

        $currentday = date('Y-m-d');
        $currentmonth = date('m');
        $currentyear = date('Y');
        $day = date('l');
        $month = date('F');
        $date = date('j');

        /******************************************************************/

        $resid   = $this->filterInput($_GET['resid']);

        #Total Number Orders Today
        if (isset($resid) && !empty($resid))
        {
            $totalordertoday = $this->getNumvalues($CFG['table']['order'],
                "restaurant_id = '" . $resid .
                "' AND DATE_FORMAT(orderdate,'%Y-%m-%d')='" . $currentday . "'");
        } else
        {
            $totalordertoday = $this->getNumvalues($CFG['table']['order'],
                "DATE_FORMAT(orderdate,'%Y-%m-%d')='" . $currentday . "'");
        }

        $admin_smarty->assign("totalordertoday", $totalordertoday);
        /******************************************************************/

        #Total Price Sales Today
        if (isset($resid) && !empty($resid))
        {
            $totalsalespricetoday = $this->getMultivalue("ordertotalprice", $CFG['table']['order'],
                "restaurant_id = '" . $resid .
                "' AND status = 'completed' AND DATE_FORMAT(orderdate,'%Y-%m-%d')='" . $currentday .
                "'");
        } else
        {
            $totalsalespricetoday = $this->getMultivalue("ordertotalprice", $CFG['table']['order'],
                "status = 'completed' AND DATE_FORMAT(orderdate,'%Y-%m-%d')='" . $currentday .
                "'");
        }

        if (is_array($totalsalespricetoday))
        {
            foreach ($totalsalespricetoday as $key => $value)
            {
                $totalsales[] = $totalsalespricetoday[$key]['ordertotalprice'];
            }
            if (!empty($totalsales))
            {
                $sales_val = str_replace(",", "", $totalsales);
                $salestoday = array_sum($sales_val);
            }
            
            $admin_smarty->assign("totalsalesordertoday", $salestoday);
        }
        /******************************************************************/

        #Deliver Order Today
        if (isset($resid) && !empty($resid))
        {
            $totaldelivertoday = $this->getNumvalues($CFG['table']['order'],
                "restaurant_id = '" . $resid .
                "' AND status = 'completed' AND DATE_FORMAT(orderdate,'%Y-%m-%d')='" . $currentday .
                "' ");
        } else
        {
            $totaldelivertoday = $this->getNumvalues($CFG['table']['order'],
                "status = 'completed' AND DATE_FORMAT(orderdate,'%Y-%m-%d')='" . $currentday .
                "' ");
        }
        $admin_smarty->assign("totaldelivertoday", $totaldelivertoday);
        /******************************************************************/

        #Pending Order Today
        if (isset($resid) && !empty($resid))
        {
            $totalpendingtoday = $this->getNumvalues($CFG['table']['order'],
                "restaurant_id = '" . $resid .
                "' AND status = 'pending' AND DATE_FORMAT(orderdate,'%Y-%m-%d')='" . $currentday .
                "' ");
        } else
        {
            $totalpendingtoday = $this->getNumvalues($CFG['table']['order'],
                "status = 'pending' AND DATE_FORMAT(orderdate,'%Y-%m-%d')='" . $currentday .
                "' ");
        }
        $admin_smarty->assign("totalpendingtoday", $totalpendingtoday);
        /******************************************************************/

        #Failed Order Today
        if (isset($resid) && !empty($resid))
        {
            $totalfailedtoday = $this->getNumvalues($CFG['table']['order'],
                "restaurant_id = '" . $resid .
                "' AND status = 'failed' AND DATE_FORMAT(orderdate,'%Y-%m-%d')='" . $currentday .
                "' ");
        } else
        {
            $totalfailedtoday = $this->getNumvalues($CFG['table']['order'],
                "status = 'failed' AND DATE_FORMAT(orderdate,'%Y-%m-%d')='" . $currentday . "' ");
        }
        $admin_smarty->assign("totalfailedtoday", $totalfailedtoday);
        /******************************************************************/

        #Processing Order Today
        if (isset($resid) && !empty($resid))
        {
            $totalprocessingtoday = $this->getNumvalues($CFG['table']['order'],
                "restaurant_id = '" . $resid .
                "' AND status = 'processing' AND DATE_FORMAT(orderdate,'%Y-%m-%d')='" . $currentday .
                "' ");
        } else
        {
            $totalprocessingtoday = $this->getNumvalues($CFG['table']['order'],
                "status = 'processing' AND DATE_FORMAT(orderdate,'%Y-%m-%d')='" . $currentday .
                "' ");
        }
        $admin_smarty->assign("totalprocessingtoday", $totalprocessingtoday);

        $admin_smarty->assign("day", $day);
        $admin_smarty->assign("month", $month);
        $admin_smarty->assign("date", $date);
        $admin_smarty->assign("currentyear", $currentyear);
    }
    #-----------------------------------------------------------------------------------------------------------
    #Dashboard Week Details
    /**
     * AdminManagement::restaurantDashboardWeekOrders()
     * 
     * @return
     */
    function restaurantDashboardWeekOrders()
    {
        global $CFG, $admin_smarty;

        $resid   = $this->filterInput($_GET['resid']);

        #Total Number Orders Week
        if (isset($resid) && !empty($resid))
        {
            $totalorderweek = $this->getNumvalues($CFG['table']['order'],
                "restaurant_id = '" . $resid . "' AND WEEK('" . CUR_TIME .
                "',7) = WEEK(orderdate,7)AND DATEDIFF('" . CUR_TIME . "',orderdate)<7 ");
        } else
        {
            $totalorderweek = $this->getNumvalues($CFG['table']['order'], "WEEK('" .
                CUR_TIME . "',7) = WEEK(orderdate,7)AND DATEDIFF('" . CUR_TIME .
                "',orderdate)<7 ");
        }
     
        $admin_smarty->assign("totalorderweek", $totalorderweek);
        /******************************************************************/
        #Total Price Sales Week
        if (isset($resid) && !empty($resid))
        {
            $totalsalespriceweek = $this->getMultivalue("ordertotalprice", $CFG['table']['order'],
                "restaurant_id = '" . $resid . "' AND status = 'completed' AND WEEK('" .
                CUR_TIME . "',7) = WEEK(orderdate,7)AND DATEDIFF('" . CUR_TIME .
                "',orderdate)<7 ");
        } else
        {
            $totalsalespriceweek = $this->getMultivalue("ordertotalprice", $CFG['table']['order'],
                "status = 'completed' AND WEEK('" . CUR_TIME .
                "',7) = WEEK(orderdate,7)AND DATEDIFF('" . CUR_TIME . "',orderdate)<7 ");
        }

        if (is_array($totalsalespriceweek))
        {
            foreach ($totalsalespriceweek as $key => $value)
            {
                $totalsalesweek[] = $totalsalespriceweek[$key]['ordertotalprice'];
            }
            if (!empty($totalsalesweek))
            {
                $sales_week = str_replace(",", "", $totalsalesweek);
                $salesweek = array_sum($sales_week);
            }
            $admin_smarty->assign("totalsalesorderweek", $salesweek);
        }
        /******************************************************************/

        #Pending Order Week
        if (isset($resid) && !empty($resid))
        {
            $totalpendingweek = $this->getNumvalues($CFG['table']['order'],
                "restaurant_id = '" . $resid . "' AND status = 'pending' AND WEEK('" .
                CUR_TIME . "',7) = WEEK(orderdate,7)AND DATEDIFF('" . CUR_TIME .
                "',orderdate)<7 ");
        } else
        {
            $totalpendingweek = $this->getNumvalues($CFG['table']['order'],
                "status = 'pending' AND WEEK('" . CUR_TIME .
                "',7) = WEEK(orderdate,7)AND DATEDIFF('" . CUR_TIME . "',orderdate)<7 ");
        }
        $admin_smarty->assign("totalpendingweek", $totalpendingweek);
        /******************************************************************/

        #Processing Order Week
        if (isset($resid) && !empty($resid))
        {
            $totalprocessingweek = $this->getNumvalues($CFG['table']['order'],
                "restaurant_id = '" . $resid . "' AND status = 'processing' AND WEEK('" .
                CUR_TIME . "',7) = WEEK(orderdate,7)AND DATEDIFF('" . CUR_TIME .
                "',orderdate)<7 ");
        } else
        {
            $totalprocessingweek = $this->getNumvalues($CFG['table']['order'],
                "status = 'processing' AND WEEK('" . CUR_TIME .
                "',7) = WEEK(orderdate,7)AND DATEDIFF('" . CUR_TIME . "',orderdate)<7 ");
        }
        $admin_smarty->assign("totalprocessingweek", $totalprocessingweek);
        /******************************************************************/

        #Deliver Order Week
        if (isset($resid) && !empty($resid))
        {
            $totaldeliverweek = $this->getNumvalues($CFG['table']['order'],
                "restaurant_id = '" . $resid . "' AND status = 'completed' AND WEEK('" .
                CUR_TIME . "',7) = WEEK(orderdate,7)AND DATEDIFF('" . CUR_TIME .
                "',orderdate)<7 ");
        } else
        {
            $totaldeliverweek = $this->getNumvalues($CFG['table']['order'],
                "status = 'completed' AND WEEK('" . CUR_TIME .
                "',7) = WEEK(orderdate,7)AND DATEDIFF('" . CUR_TIME . "',orderdate)<7 ");
        }
        $admin_smarty->assign("totaldeliverweek", $totaldeliverweek);
        /******************************************************************/

        #Failed Order Week
        if (isset($resid) && !empty($resid))
        {
            $totalfailedweek = $this->getNumvalues($CFG['table']['order'],
                "restaurant_id = '" . $resid . "' AND status = 'failed' AND WEEK('" .
                CUR_TIME . "',7) = WEEK(orderdate,7)AND DATEDIFF('" . CUR_TIME .
                "',orderdate)<7 ");
        } else
        {
            $totalfailedweek = $this->getNumvalues($CFG['table']['order'],
                "status = 'failed' AND WEEK('" . CUR_TIME .
                "',7) = WEEK(orderdate,7)AND DATEDIFF('" . CUR_TIME . "',orderdate)<7 ");
        }
        $admin_smarty->assign("totalfailedweek", $totalfailedweek);
        /******************************************************************/
    }
    #----------------------------------------------------------------------------------------------------------------
    #Dashboard Month Details
    /**
     * AdminManagement::restaurantDashboardMonthOrders()
     * 
     * @return
     */
    function restaurantDashboardMonthOrders()
    {
        global $CFG, $admin_smarty;

        $resid   = $this->filterInput($_GET['resid']);
        $currentmonth = date("Y-m");
        /******************************************************************/

        #Total Number Orders Month
        if (isset($resid) && !empty($resid))
        {
            $totalordermonth = $this->getNumvalues($CFG['table']['order'],
                "restaurant_id = '" . $resid . "' AND DATE_FORMAT(orderdate,'%Y-%m')='" .
                $currentmonth . "' ");
        } else
        {
            $totalordermonth = $this->getNumvalues($CFG['table']['order'],
                "DATE_FORMAT(orderdate,'%Y-%m')='" . $currentmonth . "' ");
        }

        $admin_smarty->assign("totalordermonth", $totalordermonth);
        /******************************************************************/

        #Total Price Sales Month
        if (isset($resid) && !empty($resid))
        {
            $totalsalespricemonth = $this->getMultivalue("ordertotalprice", $CFG['table']['order'],
                "restaurant_id = '" . $resid .
                "' AND status = 'completed' AND DATE_FORMAT(orderdate,'%Y-%m')='" . $currentmonth .
                "' ");
        } else
        {
            $totalsalespricemonth = $this->getMultivalue("ordertotalprice", $CFG['table']['order'],
                "status = 'completed' AND DATE_FORMAT(orderdate,'%Y-%m')='" . $currentmonth .
                "' ");
        }

        if (is_array($totalsalespricemonth))
        {
            foreach ($totalsalespricemonth as $key => $value)
            {
                $totalsalesmonth[] = $totalsalespricemonth[$key]['ordertotalprice'];
            }
            if (!empty($totalsalesmonth))
            {
                $sales_month = str_replace(",", "", $totalsalesmonth);
                $salesmonth = array_sum($sales_month);
            }
            $admin_smarty->assign("totalsalesordermonth", $salesmonth);
        }
        /******************************************************************/
        #Pending Order Month
        if (isset($resid) && !empty($resid))
        {
            $totalpendingmonth = $this->getNumvalues($CFG['table']['order'],
                "restaurant_id = '" . $resid .
                "' AND status = 'pending' AND DATE_FORMAT(orderdate,'%Y-%m')='" . $currentmonth .
                "' ");
        } else
        {
            $totalpendingmonth = $this->getNumvalues($CFG['table']['order'],
                "status = 'pending' AND DATE_FORMAT(orderdate,'%Y-%m')='" . $currentmonth . "' ");
        }

        $admin_smarty->assign("totalpendingmonth", $totalpendingmonth);
        /******************************************************************/

        #Processing Order Month
        if (isset($resid) && !empty($resid))
        {
            $totalprocessingmonth = $this->getNumvalues($CFG['table']['order'],
                "restaurant_id = '" . $resid .
                "' AND status = 'processing' AND DATE_FORMAT(orderdate,'%Y-%m')='" . $currentmonth .
                "' ");
        } else
        {
            $totalprocessingmonth = $this->getNumvalues($CFG['table']['order'],
                "status = 'processing' AND DATE_FORMAT(orderdate,'%Y-%m')='" . $currentmonth .
                "' ");
        }

        $admin_smarty->assign("totalprocessingmonth", $totalprocessingmonth);
        /******************************************************************/

        #Deliver Order Month
        if (isset($resid) && !empty($resid))
        {
            $totaldelivermonth = $this->getNumvalues($CFG['table']['order'],
                "restaurant_id = '" . $resid .
                "' AND status = 'completed' AND DATE_FORMAT(orderdate,'%Y-%m')='" . $currentmonth .
                "' ");
        } else
        {
            $totaldelivermonth = $this->getNumvalues($CFG['table']['order'],
                "status = 'completed' AND DATE_FORMAT(orderdate,'%Y-%m')='" . $currentmonth .
                "' ");
        }

        $admin_smarty->assign("totaldelivermonth", $totaldelivermonth);
        /******************************************************************/

        #Failed Order Month
        if (isset($resid) && !empty($resid))
        {
            $totalfailedmonth = $this->getNumvalues($CFG['table']['order'],
                "restaurant_id = '" . $resid .
                "' AND status = 'failed' AND DATE_FORMAT(orderdate,'%Y-%m')='" . $currentmonth .
                "' ");
        } else
        {
            $totalfailedmonth = $this->getNumvalues($CFG['table']['order'],
                "status = 'failed' AND DATE_FORMAT(orderdate,'%Y-%m')='" . $currentmonth . "' ");
        }

        $admin_smarty->assign("totalfailedmonth", $totalfailedmonth);
        /******************************************************************/

    }
    #-----------------------------------------------------------------------------------------------------------
    #Dashboard Year Details
    /**
     * AdminManagement::restaurantDashboardYearOrders()
     * 
     * @return
     */
    function restaurantDashboardYearOrders()
    {
        global $CFG, $admin_smarty;

        $resid  = $this->filterInput($_GET['resid']);

        $currentyear = date("Y");
        /******************************************************************/

        #Total Number Orders Year
        if (isset($resid) && !empty($resid))
        {
            $totalorderyear = $this->getNumvalues($CFG['table']['order'],
                "restaurant_id = '" . $resid . "' AND DATE_FORMAT(orderdate,'%Y')='" . $currentyear .
                "' ");
        } else
        {
            $totalorderyear = $this->getNumvalues($CFG['table']['order'],
                "DATE_FORMAT(orderdate,'%Y')='" . $currentyear . "' ");
        }

        $admin_smarty->assign("totalorderyear", $totalorderyear);
        /******************************************************************/

        #Total Price Sales Year
        if (isset($resid) && !empty($resid))
        {
            $totalsalespriceyear = $this->getMultivalue("ordertotalprice", $CFG['table']['order'],
                "restaurant_id = '" . $resid .
                "' AND status = 'completed' AND DATE_FORMAT(orderdate,'%Y')='" . $currentyear .
                "' ");
        } else
        {
            $totalsalespriceyear = $this->getMultivalue("ordertotalprice", $CFG['table']['order'],
                "status = 'completed' AND DATE_FORMAT(orderdate,'%Y')='" . $currentyear . "' ");
        }

        if (is_array($totalsalespriceyear))
        {
            foreach ($totalsalespriceyear as $key => $value)
            {
                $totalsalesyear[] = $totalsalespriceyear[$key]['ordertotalprice'];
            }
            if (!empty($totalsalesyear))
            {
                $sales_year = str_replace(",", "", $totalsalesyear);
                $salesyear = array_sum($sales_year);
            }
            $admin_smarty->assign("totalsalesorderyear", $salesyear);
        }
        /******************************************************************/
        #Pending Order Year
        if (isset($resid) && !empty($resid))
        {
            $totalpendingyear = $this->getNumvalues($CFG['table']['order'],
                "restaurant_id = '" . $resid .
                "' AND status = 'pending' AND DATE_FORMAT(orderdate,'%Y')='" . $currentyear .
                "' ");
        } else
        {
            $totalpendingyear = $this->getNumvalues($CFG['table']['order'],
                "status = 'pending' AND DATE_FORMAT(orderdate,'%Y')='" . $currentyear . "' ");
        }

        $admin_smarty->assign("totalpendingyear", $totalpendingyear);
        /******************************************************************/

        #Processing Order Year
        if (isset($resid) && !empty($resid))
        {
            $totalprocessingyear = $this->getNumvalues($CFG['table']['order'],
                "restaurant_id = '" . $resid .
                "' AND status = 'processing' AND DATE_FORMAT(orderdate,'%Y')='" . $currentyear .
                "' ");
        } else
        {
            $totalprocessingyear = $this->getNumvalues($CFG['table']['order'],
                "status = 'processing' AND DATE_FORMAT(orderdate,'%Y')='" . $currentyear . "' ");
        }

        $admin_smarty->assign("totalprocessingyear", $totalprocessingyear);
        /******************************************************************/

        #Deliver Order Year
        if (isset($resid) && !empty($resid))
        {
            $totaldeliveryear = $this->getNumvalues($CFG['table']['order'],
                "restaurant_id = '" . $resid .
                "' AND status = 'completed' AND DATE_FORMAT(orderdate,'%Y')='" . $currentyear .
                "' ");
        } else
        {
            $totaldeliveryear = $this->getNumvalues($CFG['table']['order'],
                "status = 'completed' AND DATE_FORMAT(orderdate,'%Y')='" . $currentyear . "' ");
        }

        $admin_smarty->assign("totaldeliveryear", $totaldeliveryear);
        /******************************************************************/

        #Failed Order Year
        if (isset($resid) && !empty($resid))
        {
            $totalfailedyear = $this->getNumvalues($CFG['table']['order'],
                "restaurant_id = '" . $resid .
                "' AND status = 'failed' AND DATE_FORMAT(orderdate,'%Y')='" . $currentyear .
                "' ");
        } else
        {
            $totalfailedyear = $this->getNumvalues($CFG['table']['order'],
                "status = 'failed' AND DATE_FORMAT(orderdate,'%Y')='" . $currentyear . "' ");
        }

        $admin_smarty->assign("totalfailedyear", $totalfailedyear);
        /******************************************************************/

    }
    #---------------------------------------------------------------------------------------------------------
    #Dashboard List
    /**
     * AdminManagement::restaurantDashboardLastOrders()
     * 
     * @return
     */
    function restaurantDashboardLastOrders()
    {
        global $CFG, $admin_smarty;

        #$sel_order = "SELECT ordergenerateid, restaurant_id, customername, ordertotalprice, orderdate, status FROM ".$CFG['table']['order']." WHERE status = 'completed' GROUP BY restaurant_id ORDER BY orderid DESC ";
        $sel_order = "SELECT ord.ordergenerateid, ord.restaurant_id, ord.customername, ord.ordertotalprice, ord.orderdate, ord.status " .
            " FROM " . $CFG['table']['order'] . " AS ord " . " RIGHT JOIN " . $CFG['table']['restaurant'] .
            " AS res ON res.restaurant_id = ord.restaurant_id " .
            " WHERE ord.status = 'completed' ORDER BY ord.orderid DESC LIMIT 10";
        #echo $sel_order;
        $res_order = $this->ExecuteQuery($sel_order, 'select');
        foreach ($res_order as $key => $value)
        {
            $res_order[$key]['restaurantname'] = $this->getValue("restaurant_name", $CFG['table']['restaurant'],
                "restaurant_id = '" . $this->filterInput($res_order[$key]['restaurant_id']) . "'");
            $res_order[$key]['streetaddress'] = $this->getValue("restaurant_streetaddress",
                $CFG['table']['restaurant'], "restaurant_id = '" . $this->filterInput($res_order[$key]['restaurant_id']) .
                "'");
        }
        #echo "<pre>";print_r($res_order);echo "</pre>";
        $admin_smarty->assign("ordersList_lastCnt", count($res_order));
        $admin_smarty->assign("ordersList_lastorder", $res_order);
    }
    #---------------------------------------------------------------------------------------------------------
    #Dashboard List
    /**
     * AdminManagement::topDiscountRestaurants()
     * 
     * @return
     */
    function topDiscountRestaurants()
    {
        global $CFG, $admin_smarty;

        $today = date("Y-m-d");

        #$sel_offer = "SELECT offer_id, restaurant_id, offer_percentage, offer_price, offer_valid_from, offer_valid_to, addeddate, status FROM ".$CFG['table']['restaurant_offer']." WHERE offer_valid_from <= '".$today."' AND offer_valid_to >= '".$today."' AND status = '1' GROUP BY restaurant_id  ORDER BY offer_percentage DESC ";
        $sel_offer = "SELECT off.offer_id, off.restaurant_id, off.offer_percentage, off.offer_price, off.offer_valid_from, off.offer_valid_to, off.addeddate, off.status" .
            " FROM " . $CFG['table']['restaurant_offer'] . " AS off" . " RIGHT JOIN " . $CFG['table']['restaurant'] .
            " AS res ON res.restaurant_id = off.restaurant_id " .
            " WHERE off.offer_valid_from <= '" . $today . "' AND off.offer_valid_to >= '" .
            $today . "' AND off.status = '1' GROUP BY off.restaurant_id ORDER BY off.offer_percentage DESC ";
        $res_offer = $this->ExecuteQuery($sel_offer, 'select');
        foreach ($res_offer as $key => $value)
        {
            $res_offer[$key]['restaurantname'] = $this->getValue("restaurant_name", $CFG['table']['restaurant'],
                "restaurant_id = '" . $this->filterInput($res_offer[$key]['restaurant_id']) . "'");
        }
        #echo "<pre>";print_r($res_offer);echo "</pre>";
        $admin_smarty->assign("topofferlistCnt", count($res_offer));
        $admin_smarty->assign("topofferlist", $res_offer);
    }
    #--------------------------------------------------------------------------------------------------------
    #Dashboard List
    /**
     * AdminManagement::restaurantDashboardAllorderInfo()
     * 
     * @return
     */
    function restaurantDashboardAllorderInfo()
    {
        global $CFG, $admin_smarty;

        $sel_order = "SELECT ordergenerateid, customername, ordertotalprice, orderdate FROM " .
            $CFG['table']['order'] . " WHERE restaurant_id = '" . $this->filterInput($_GET['resid']) .
            "' ORDER BY orderid DESC ";
        $res_order = $this->ExecuteQuery($sel_order, 'select');
        #echo "<pre>";print_r($res_order);echo "</pre>";
        $admin_smarty->assign("ordersList_allorderCnt", count($res_order));
        $admin_smarty->assign("ordersList_allorder", $res_order);
    }
    #---------------------------------------------------------------
    #Dashboard List Pending
    /**
     * AdminManagement::restaurantDashboardPendingOrderInfo()
     * 
     * @return
     */
    function restaurantDashboardPendingOrderInfo()
    {
        global $CFG, $admin_smarty;

        $sel_pendorder = "SELECT ordergenerateid, customername, ordertotalprice, orderdate FROM " .
            $CFG['table']['order'] . " WHERE status = 'pending' AND restaurant_id = '" . $this->filterInput($_GET['resid']) .
            "' ORDER BY orderid DESC ";
        $res_pendorder = $this->ExecuteQuery($sel_pendorder, 'select');
        #echo "<pre>";print_r($res_pendorder);echo "</pre>";
        $admin_smarty->assign("ordersList_pendingorderCnt", count($res_pendorder));
        $admin_smarty->assign("ordersList_pendingorder", $res_pendorder);
    }
    #---------------------------------------------------------------
    #Dashboard List Processing
    /**
     * AdminManagement::restaurantDashboardProcessingOrderInfo()
     * 
     * @return
     */
    function restaurantDashboardProcessingOrderInfo()
    {
        global $CFG, $admin_smarty;

        $sel_processorder = "SELECT ordergenerateid, customername, ordertotalprice, orderdate FROM " .
            $CFG['table']['order'] . " WHERE status = 'processing' AND restaurant_id = '" .
            $this->filterInput($_GET['resid']) . "' ORDER BY orderid DESC ";
        $res_processorder = $this->ExecuteQuery($sel_processorder, 'select');
        #echo "<pre>";print_r($res_processorder);echo "</pre>";
        $admin_smarty->assign("ordersList_processingorderCnt", count($res_processorder));
        $admin_smarty->assign("ordersList_processingorder", $res_processorder);
    }
    #---------------------------------------------------------------
    #Dashboard List Delivered
    /**
     * AdminManagement::restaurantDashboardDeliveredOrderInfo()
     * 
     * @return
     */
    function restaurantDashboardDeliveredOrderInfo()
    {
        global $CFG, $admin_smarty;

        $sel_deliverorder = "SELECT ordergenerateid, customername, ordertotalprice, orderdate FROM " .
            $CFG['table']['order'] . " WHERE status = 'completed' AND restaurant_id = '" . $this->filterInput($_GET['resid']) .
            "' ORDER BY orderid DESC ";
        $res_deliverorder = $this->ExecuteQuery($sel_deliverorder, 'select');
        #echo "<pre>";print_r($res_processorder);echo "</pre>";
        $admin_smarty->assign("ordersList_deliveredorderCnt", count($res_deliverorder));
        $admin_smarty->assign("ordersList_deliveredorder", $res_deliverorder);
    }
    #---------------------------------------------------------------
    #Dashboard List Failed
    /**
     * AdminManagement::restaurantDashboardFailedOrderInfo()
     * 
     * @return
     */
    function restaurantDashboardFailedOrderInfo()
    {
        global $CFG, $admin_smarty;

        $sel_failorder = "SELECT ordergenerateid, customername, ordertotalprice, orderdate FROM " .
            $CFG['table']['order'] . " WHERE status = 'failed' AND restaurant_id = '" . $this->filterInput($_GET['resid']) .
            "' ORDER BY orderid DESC ";
        $res_failorder = $this->ExecuteQuery($sel_failorder, 'select');
        #echo "<pre>";print_r($res_processorder);echo "</pre>";
        $admin_smarty->assign("ordersList_failedorderCnt", count($res_failorder));
        $admin_smarty->assign("ordersList_failedorder", $res_failorder);
    }
    #--------------------------------------------------------------------------------
    #  Cuisine Management
    #--------------------------------------------------------------------------------
    #cuisine validation
    /**
     * AdminManagement::paymentinfoValidation()
     * 
     * @return
     */
    function paymentinfoValidation()
    {
        global $CFG;

        $paymentinfo_name = $this->filterInput($_POST["paymentinfo_name"]);
        $noofrows = $this->getNumvalues($CFG['table']['paymentinfo'],
            "paymentinfo_name='" . $paymentinfo_name . "'");

        if ($noofrows != 0)
        {
            echo "exist";
            exit();
        }
    }
    #--------------------------------------------------------------------------------
    #Add paymentInfo
    /**
     * AdminManagement::paymentInfoAdd()
     * 
     * @return
     */
    function paymentInfoAdd()
    {
        global $CFG, $admin_smarty, $objThumb;

        $paymentinfo_name = $this->filterInput($_POST["paymentinfo_name"]);
        $paymentinfo_seourl = $this->seoUrl($_POST["paymentinfo_name"]);

        $query = "INSERT INTO " . $CFG['table']['paymentinfo'] .
            " SET paymentinfo_name = '" . $paymentinfo_name . "', paymentinfo_seourl = '" .
            $paymentinfo_seourl . "', addeddate = '" . CUR_TIME . "'";
        $LastInsertedId = $this->ExecuteQuery($query, "insert");

        if (isset($_FILES['paymentinfo_photo']['name']) && !empty($_FILES['paymentinfo_photo']['name']))
        {

            $logoext = $this->getFileExtension($_FILES['paymentinfo_photo']['name']);
            $logoname = $this->seoUrl($_POST["paymentinfo_name"]) . "." . $logoext;
            $logoimage = "photo_" . $logoname;
            $dest_name = $CFG['site']['photo_paymentinfo_path'] . '/' . $logoimage;

            $uploadsuccess = @move_uploaded_file($_FILES['paymentinfo_photo']['tmp_name'], $dest_name);
            @chmod($dest_name, 0777);

            if ($uploadsuccess)
            {
                #Get Thumbnail width & height
                $paymentthumb = $this->iconSettingValues();

                #Create Thumbnail
                $sour_imagepath = $dest_name;
                $photo = "thumb_" . $logoname;

                $dest_imagepath = $CFG['site']['photo_paymentinfo_path'] . '/' . $photo;
                $objThumb->createThumb($sour_imagepath, $dest_imagepath, $paymentthumb['0']['paymenticon_width'], $paymentthumb['0']['paymenticon_height'], 'crop');

                @unlink($dest_name);

                $query = "UPDATE " . $CFG['table']['paymentinfo'] . " SET paymentinfo_photo = '" .
                    $photo . "' WHERE paymentinfo_id = '" . $LastInsertedId . "' ";
                $res = $this->ExecuteQuery($query, "update");
            }
        }
        $this->redirectUrl("paymentInfoManage.php");
    }
    #--------------------------------------------------------------------------------
    #paymentInfoEdit
    /**
     * AdminManagement::paymentInfoEditValidation()
     * 
     * @return
     */
    function paymentInfoEditValidation()
    {
        global $CFG;

        $paymentinfo_name = $this->filterInput($_POST['paymentinfo_name']);

        $noofrows = $this->getNumvalues($CFG['table']['paymentinfo'],
            "paymentinfo_name='" . $paymentinfo_name . "' AND paymentinfo_id !='" . $this->filterInput($_POST['payid']) .
            "' ");
        if ($noofrows != 0)
        {
            echo "exist";
            exit();
        }
    }
    #--------------------------------------------------------------------------------
    #Edit Cuisine Name
    /**
     * AdminManagement::paymentInfoEdit()
     * 
     * @return
     */
    function paymentInfoEdit()
    {
        global $CFG, $admin_smarty, $objThumb;

        $payid              = $this->filterInput($_GET['payid']);

        $paymentinfo_name = $this->filterInput($_POST["paymentinfo_name"]);
        $paymentinfo_seourl = $this->seoUrl($_POST["paymentinfo_name"]);

        $UpQuery = "UPDATE " . $CFG['table']['paymentinfo'] .
            " SET paymentinfo_name = '" . $paymentinfo_name . "', paymentinfo_seourl = '" .
            $paymentinfo_seourl . "'	WHERE paymentinfo_id  = '" . $payid . "' ";
        $UpResult = $this->ExecuteQuery($UpQuery, 'update');

        #echo "<pre>";print_r($_FILES);echo "</pre>";
        $imagesizedata = getimagesize($_FILES['paymentinfo_photo']['tmp_name']); 
        if (isset($_FILES['paymentinfo_photo']['name']) && !empty($_FILES['paymentinfo_photo']['name']) && $imagesizedata == TRUE)
        {

            $getphotoname = $this->getValue("paymentinfo_photo", $CFG['table']['paymentinfo'],
                "paymentinfo_id = '" . $payid . "' ");
            if (!empty($getphotoname))
            {
                @unlink($CFG['site']['photo_paymentinfo_path'] . '/' . $getphotoname);
            }

            $logoext = $this->getFileExtension($_FILES['paymentinfo_photo']['name']);
            $logoname = $this->seoUrl($_POST["paymentinfo_name"]) .time(). "." . $logoext;
            $logoimage = "photo_" . $logoname;
            $dest_name = $CFG['site']['photo_paymentinfo_path'] . '/' . $logoimage;

            $uploadsuccess = @move_uploaded_file($_FILES['paymentinfo_photo']['tmp_name'], $dest_name);
            @chmod($dest_name, 0777);

            if ($uploadsuccess)
            {
                #Get Thumbnail width & height
                $paymentthumb = $this->iconSettingValues();

                #Create Thumbnail
                $sour_imagepath = $dest_name;
                $photo = "thumb_" . $logoname;

                $dest_imagepath = $CFG['site']['photo_paymentinfo_path'] . '/' . $photo;
                $objThumb->createThumb($sour_imagepath, $dest_imagepath, $paymentthumb['0']['paymenticon_width'],
                    $paymentthumb['0']['paymenticon_height'], 'crop');

                @unlink($dest_name);

                $query = "UPDATE " . $CFG['table']['paymentinfo'] . " SET paymentinfo_photo = '" .
                    $photo . "' WHERE paymentinfo_id = '" . $payid . "' ";
                $res = $this->ExecuteQuery($query, "update");
            }
        }
        $this->redirectUrl("paymentInfoManage.php");
    }
    #--------------------------------------------------------------------------------
    #payment info List manage
    /**
     * AdminManagement::paymentInfoList()
     * 
     * @return
     */
    function paymentInfoList()
    {
        global $CFG, $admin_smarty;

        $req_keyword        = $this->filterInput($_REQUEST['keyword']);

        if (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'casc')
        {
            $sort = " ORDER BY paymentinfo_name ASC";
            $fields .= "&sortby=casc";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'cdesc')
        {
            $sort = " ORDER BY paymentinfo_name DESC";
            $fields .= "&sortby=cdesc";
        } else
        {
            $sort .= " ORDER BY paymentinfo_name ASC";
        }

        #Status
        if (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'active')
        {
            $condition .= " AND paymentinfo_status = '1' ";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'deactive')
        {
            $condition .= " AND paymentinfo_status = '0' ";
        }
        #Status For Restaurant
        if (isset($_REQUEST['resid']) && !empty($_REQUEST['resid']))
        {
            $condition .= " AND paymentinfo_status = '1' ";
        }

        if (isset($_REQUEST['limit']) && !empty($_REQUEST['limit']) && ($_REQUEST['limit'] !=
            "all"))
        {
            $limit = $_REQUEST['limit'];
            $fields = "&limit=$_REQUEST[limit]";
        } else
        {
            $limit = PAGELIMIT;
        }

        $page = $_REQUEST['page'];
        if ($page == 0)
            $page = 1;
        if ($page)
            $start = ($page - 1) * $limit;
        else
            $start = 0;

        if (!empty($_REQUEST['limit']) && ($_REQUEST['limit'] == "all"))
        {
            $sql_lim = $this->filterInput($_REQUEST['limit']);
        } else
        {
            $sql_lim = "$start, $limit";
        }

        #Keyword
        if (isset($req_keyword) && !empty($req_keyword))
        {
            $keyword = "&keyword=$_REQUEST[keyword]";
            $condition .= "AND paymentinfo_name LIKE '%" . addslashes($req_keyword) .
                "%' ";
            $fields .= "&keyword=$_REQUEST[keyword]$fields";
        }

        $sql_sel = "SELECT paymentinfo_id, paymentinfo_name, paymentinfo_photo, paymentinfo_status, addeddate FROM " .
            $CFG['table']['paymentinfo'] . " WHERE  paymentinfo_id IS NOT NULL $condition $sort";
        $total_pages = $this->ExecuteQuery($sql_sel, 'norows');

        $targetpage = "paymentinfoManage.php";
        $next_page = $this->make_page($targetpage, $total_pages, $limit, $page, $fields);
        $sql_limit = $sql_sel . " LIMIT " . $sql_lim;
        $result = mysqli_query($this->DBCONN,$sql_limit) or die(mysqli_error($this->DBCONN));

        $cnt = 1;
        while ($row_seller = mysqli_fetch_array($result))
        {
            $row_seller['sno'] = (($page - 1) * $limit) + $cnt;
            $row_seller['paymentmethod'] = $this->getValue("paymentmethod", $CFG['table']['restaurant_choose_paymentoption'],
                "paymentoption = '" . $this->filterInput($row_seller['paymentinfo_id']) . "' AND restaurant_id = '" .
                $this->filterInput($_GET['resid']) . "'");
            $paymentinfoList[] = $row_seller;
            $cnt++;
        }

        #echo "<pre>";print_r($paymentinfoList);echo "</pre>";
        #From & To Records
        if ($page == 1)
        {
            $fromRecords = 1;
            $toRecords = $limit;
            if ($toRecords >= $total_pages)
                $toRecords = $total_pages;
        } else
        {
            $fromRecords = $start + 1;
            $toRecords = $start + $limit;
            if ($toRecords >= $total_pages)
                $toRecords = $total_pages;
        }


        $admin_smarty->assign("tablename", $CFG['table']['paymentinfo']);
        $admin_smarty->assign("whereField", 'paymentinfo_id');
        $admin_smarty->assign("fieldname", 'paymentinfo_status');
        $admin_smarty->assign("word", 'Paymentinfo');
        $admin_smarty->assign("filename", 'paymentinfoManage.php');
        $admin_smarty->assign("page", $page);

        $admin_smarty->assign("totalRecords", $total_pages);
        $admin_smarty->assign("fromRecords", $fromRecords);
        $admin_smarty->assign("toRecords", $toRecords);
        $admin_smarty->assign("limit", $limit);

        $admin_smarty->assign("paymentinfo_List", $paymentinfoList);
        $admin_smarty->assign("pagination", $next_page);
    }
    #--------------------------------------------------------------------------------
    #Select payment method option
    /**
     * AdminManagement::selectpaymentMethod()
     * 
     * @return
     */
    function selectpaymentMethod()
    {
        global $CFG, $admin_smarty;

        if ($_POST['changestatusval'] == 'Yes')
        {

            $ins = "INSERT INTO 
								" . $CFG['table']['restaurant_choose_paymentoption'] . " 
							SET 
								restaurant_id = '" . $this->filterInput($_POST['resid']) . "',
								paymentoption = '" . $this->filterInput($_POST['maincateid']) . "',
								paymentmethod = '" . $this->filterInput($_POST['changestatusval']) . "',
								addeddate     = '" . CUR_TIME . "' ";
            $res = $this->ExecuteQuery($ins, 'insert');
            echo 'success';
        } else
        {

            $del = "DELETE FROM " . $CFG['table']['restaurant_choose_paymentoption'] .
                " WHERE restaurant_id = '" . $this->filterInput($_POST['resid']) . "' AND paymentoption = '" . $this->filterInput($_POST['maincateid']) .
                "'";
            $res = $this->ExecuteQuery($del, 'delete');
            echo 'success';
        }
    }
    #--------------------------------------------------------------------------------
    #Site Feedback List
    /**
     * AdminManagement::siteFeedbackList()
     * 
     * @return
     */
    function siteFeedbackList()
    {
        global $CFG, $admin_smarty;

        $req_keyword        = $this->filterInput($_REQUEST['keyword']);
        
        if (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'resasc')
        {
            $sort = " ORDER BY feed.restaurantname ASC";
            $fields .= "&sortby=resasc";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'resdesc')
        {
            $sort = " ORDER BY feed.restaurantname DESC";
            $fields .= "&sortby=resdesc";
        } else
        {
            $sort .= " ORDER BY id DESC";
        }
        
        #Status
        if (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'active')
        {
            $condition .= " AND feed.status = '1' ";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'deactive')
        {
            $condition .= " AND feed.status = '0' ";
        }
        #Status For Restaurant
        if (isset($_REQUEST['resid']) && !empty($_REQUEST['resid']))
        {
            $condition .= " AND feed.status = '1' ";
        }


        #Limit
        if (isset($_REQUEST['limit']) && !empty($_REQUEST['limit']) && ($_REQUEST['limit'] !=
            "all"))
        {
            $limit = $_REQUEST['limit'];
            $fields = "&limit=$_REQUEST[limit]";
        } else
        {
            $limit = PAGELIMIT;
        }

        $page = $_REQUEST['page'];
        if ($page == 0)
            $page = 1;
        if ($page)
            $start = ($page - 1) * $limit;
        else
            $start = 0;

        if (!empty($_REQUEST['limit']) && ($_REQUEST['limit'] == "all"))
        {
            $sql_lim = $this->filterInput($_REQUEST['limit']);
        } else
        {
            $sql_lim = "$start, $limit";
        }

        #Keyword
        if (isset($req_keyword) && !empty($req_keyword))
        {
            $keyword = "&keyword=$_REQUEST[keyword]";
            /*$condition .= "AND restaurantname LIKE '%" . addslashes($req_keyword) .
                "%' ";*/
            $condition .= "AND res.restaurant_name LIKE '%".addslashes($req_keyword)."%' OR feed.feedback LIKE '%".addslashes($req_keyword)."%'";       
            $fields .= "&keyword=$_REQUEST[keyword]$fields";
        }

        /*if(isset($resid) && !empty($resid)){
        $fields .= "&resid=$_REQUEST[resid]$fields";
        }*/

        if (isset($_REQUEST['type']) && !empty($_REQUEST['type']))
        {
            $fields .= "&type=$_REQUEST[type]$fields";
        }

        /*if(isset($_GET['resid']) && !empty($_GET['resid'])){
        $rest_cond = " AND restaurant_id = '".$_GET['resid']."' ";
        
        $restname = $this->getValue('restaurant_name',$CFG['table']['restaurant'],"restaurant_id = '".$_GET['resid']."'");
        $admin_smarty->assign("restname",$restname);
        }*/

        if (isset($_REQUEST['searchrestaurantid']) && !empty($_REQUEST['searchrestaurantid']))
        {
            $condition .= " AND feed.restaurantname = '" . $this->filterInput($_REQUEST['searchrestaurantid']) . "' ";
        }

        $sql_sel = " SELECT feed.id, feed.restaurantname, feed.restaurantcity, feed.feedback, feed.addeddate, feed.status, ". 
                    "res.restaurant_name ".
                    "FROM " .$CFG['table']['sitefeedback'] . " AS feed ".
                    "LEFT JOIN " .$CFG['table']['restaurant'] . " AS res ON feed.restaurantname = res.restaurant_id".
                    " WHERE id IS NOT NULL AND res.restaurant_status = '1' AND res.delete_status = 'No' " . $condition . " " . $sort ." ";
                    
        $total_pages = $this->ExecuteQuery($sql_sel, 'norows');
        $targetpage = "siteFeedbackManage.php";
        $next_page = $this->make_page($targetpage, $total_pages, $limit, $page, $fields);
        $sql_limit = $sql_sel . " LIMIT " . $sql_lim;
        $result = mysqli_query($this->DBCONN,$sql_limit) or die(mysqli_error($this->DBCONN));
        $cnt = 1;
        while ($row_seller = mysqli_fetch_array($result))
        {
            $row_seller['sno'] = (($page - 1) * $limit) + $cnt . '.';
            $row_seller['addeddate'] = $this->setDateFormatWithOutTime($row_seller['addeddate']);
            $row_seller['resname'] = $this->getValue("restaurant_name", $CFG['table']['restaurant'],
                "restaurant_id = '" . $this->filterInput($row_seller['restaurantname']) . "'");
            $sitefeedbackList[] = $row_seller;
            $cnt++;
        }
        //echo "<pre>";print_r($sitefeedbackList);echo "</pre>";
        #From & To Records
        if ($page == 1)
        {
            $fromRecords = 1;
            $toRecords = $limit;
            if ($toRecords >= $total_pages)
                $toRecords = $total_pages;
        } else
        {
            $fromRecords = $start + 1;
            $toRecords = $start + $limit;
            if ($toRecords >= $total_pages)
                $toRecords = $total_pages;
        }

        $admin_smarty->assign("tablename", $CFG['table']['sitefeedback']);
        $admin_smarty->assign("whereField", 'id');
        $admin_smarty->assign("fieldname", 'status');
        $admin_smarty->assign("word", 'Feedback');
        $admin_smarty->assign("filename", 'siteFeedbackManage.php');
        $admin_smarty->assign("page", $page);

        $admin_smarty->assign("totalRecords", $total_pages);
        $admin_smarty->assign("fromRecords", $fromRecords);
        $admin_smarty->assign("toRecords", $toRecords);
        $admin_smarty->assign("limit", $limit);

        $admin_smarty->assign("sitefeedbackList", $sitefeedbackList);
        $admin_smarty->assign("pagination", $next_page);
    }
    #--------------------------------------------------------------------------------
    #Contact Us List
    /**
     * AdminManagement::contactUsList()
     * 
     * @return
     */
    function contactUsList()
    {
        global $CFG, $admin_smarty;

        $req_keyword        = $this->filterInput($_REQUEST['keyword']);

        if (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'resasc')
        {
            $sort = " ORDER BY contact_name ASC";
            $fields .= "&sortby=resasc";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'resdesc')
        {
            $sort = " ORDER BY contact_name DESC";
            $fields .= "&sortby=resdesc";
        } else
        {
            $sort .= " ORDER BY contact_id DESC";
        }
        #status
        if (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'active')
        {
            $condition .= " AND contact_status = '1' ";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'deactive')
        {
            $condition .= " AND contact_status = '0' ";
        }
        #Status For Restaurant
        if (isset($_REQUEST['resid']) && !empty($_REQUEST['resid']))
        {
            $condition .= " AND feed.status = '1' ";
        }


        #Limit
        if (isset($_REQUEST['limit']) && !empty($_REQUEST['limit']) && ($_REQUEST['limit'] !=
            "all"))
        {
            $limit = $_REQUEST['limit'];
            $fields = "&limit=$_REQUEST[limit]";
        } else
        {
            $limit = PAGELIMIT;
        }

        $page = $_REQUEST['page'];
        if ($page == 0)
            $page = 1;
        if ($page)
            $start = ($page - 1) * $limit;
        else
            $start = 0;

        if (!empty($_REQUEST['limit']) && ($_REQUEST['limit'] == "all"))
        {
            $sql_lim = $this->filterInput($_REQUEST['limit']);
        } else
        {
            $sql_lim = "$start, $limit";
        }

        #Keyword
        if (isset($req_keyword) && !empty($req_keyword))
        {
            $keyword = "&keyword=$_REQUEST[keyword]";
            $condition .= "AND contact_name LIKE '%" . addslashes($req_keyword)  ."%' ";
            $fields .= "&keyword=$_REQUEST[keyword]$fields";
        }

        /*if(isset($resid) && !empty($resid)){
        $fields .= "&resid=$_REQUEST[resid]$fields";
        }*/

        if (isset($_REQUEST['type']) && !empty($_REQUEST['type']))
        {
            $fields .= "&type=$_REQUEST[type]$fields";
        }

        /*if(isset($_GET['resid']) && !empty($_GET['resid'])){
        $rest_cond = " AND restaurant_id = '".$_GET['resid']."' ";
        
        $restname = $this->getValue('restaurant_name',$CFG['table']['restaurant'],"restaurant_id = '".$_GET['resid']."'");
        $admin_smarty->assign("restname",$restname);
        }*/

        if (isset($_REQUEST['searchrestaurantid']) && !empty($_REQUEST['searchrestaurantid']))
        {
            $condition .= " AND contact_name = '" . $this->filterInput($_REQUEST['contact_id']) . "' ";
        }

        $sql_sel = "SELECT contact_id,contact_name,contact_email,contact_ordernumber,contact_orderdate,contact_restaurantname,addeddate,contact_status,contact_comments FROM " .
            $CFG['table']['contactus'] . " WHERE contact_id IS NOT NULL " . $condition . " " .
            $sort . "  ";

        $total_pages = $this->ExecuteQuery($sql_sel, 'norows');
        $targetpage = "contactUsManage.php";
        $next_page = $this->make_page($targetpage, $total_pages, $limit, $page, $fields);
        $sql_limit = $sql_sel . " LIMIT " . $sql_lim;
        $result = mysqli_query($this->DBCONN,$sql_limit) or die(mysqli_error($this->DBCONN));
        $cnt = 1;
        while ($row_seller = mysqli_fetch_array($result))
        {
            $row_seller['sno'] = (($page - 1) * $limit) + $cnt . '.';
            $row_seller['addeddate'] = $this->setDateFormatWithOutTime($row_seller['addeddate']);
            if($row_seller['contact_orderdate'] != '') {
                $row_seller['contact_orderdate'] = $this->setDateFormatWithOutTime($row_seller['contact_orderdate']);
            }
            $row_seller['contactname'] = $this->getValue("contact_name", $CFG['table']['contactus'],
                "contact_id = '" . $this->filterInput($row_seller['contact_name']) . "'");
            $contactUsList[] = $row_seller;
            $cnt++;
        }
        //echo "<pre>";print_r($contactUsList);echo "</pre>";
        #From & To Records
        if ($page == 1)
        {
            $fromRecords = 1;
            $toRecords = $limit;
            if ($toRecords >= $total_pages)
                $toRecords = $total_pages;
        } else
        {
            $fromRecords = $start + 1;
            $toRecords = $start + $limit;
            if ($toRecords >= $total_pages)
                $toRecords = $total_pages;
        }

        $admin_smarty->assign("tablename", $CFG['table']['contactus']);
        $admin_smarty->assign("whereField", 'contact_id');
        $admin_smarty->assign("fieldname", 'contact_status');
        $admin_smarty->assign("word", 'Contact Comments');
        $admin_smarty->assign("filename", 'contactUsManage.php');
        $admin_smarty->assign("page", $page);

        $admin_smarty->assign("totalRecords", $total_pages);
        $admin_smarty->assign("fromRecords", $fromRecords);
        $admin_smarty->assign("toRecords", $toRecords);
        $admin_smarty->assign("limit", $limit);

        $admin_smarty->assign("contactUsList", $contactUsList);
        $admin_smarty->assign("pagination", $next_page);
    }
    #--------------------------------------------------------------------------------
    #  Index Banner Management
    #--------------------------------------------------------------------------------
    #--------------------------------------------------------------------------------
    #Add new banner
    /**
     * AdminManagement::bannerAdd()
     * 
     * @return
     */
    function bannerAdd()
    {
        global $CFG, $admin_smarty, $objThumb;

        $ins = "INSERT INTO " . $CFG['table']['indexbanner'] .
            " SET banner_photo = '',addeddate = '" . CUR_TIME . "' ";
        $res = $this->ExecuteQuery($ins, "insert");
        if ($res)
        {
            $imagesizedata = getimagesize($_FILES['banner_photo']['tmp_name']);
            if (isset($_FILES['banner_photo']['name']) && !empty($_FILES['banner_photo']['name']) && $imagesizedata == TRUE)
            {

                $logoext = $this->getFileExtension($_FILES['banner_photo']['name']);
                $logoname = 'Image_banner_' . $res . "." . $logoext;
                //$logoname  = $_FILES['banner_photo']['name'].$res;
                $logoimage = "photo_" . $logoname;
                $dest_name = $CFG['site']['photo_banner_path'] . '/' . $logoimage;

                $uploadsuccess = @move_uploaded_file($_FILES['banner_photo']['tmp_name'], $dest_name);
                @chmod($dest_name, 0777);

                if ($uploadsuccess)
                {
                    #Get Thumbnail width & height
                    $cuisinethumb = $this->iconSettingValues();

                    #Create Thumbnail
                    $sour_imagepath = $dest_name;
                    $photo = "thumb_" . $logoname;

                    $dest_imagepath = $CFG['site']['photo_banner_path'] . '/' . $photo;
                    //$objThumb->createThumb($sour_imagepath,$dest_imagepath,255,210,'crop');
                    $objThumb->createThumb($sour_imagepath, $dest_imagepath, 1348, 293, 'crop');
                    @unlink($dest_name);

                    $query = "UPDATE " . $CFG['table']['indexbanner'] . " SET banner_photo = '" . $photo .
                        "',addeddate = '" . CUR_TIME . "' WHERE banner_id = '" . $res . "' ";
                    $res = $this->ExecuteQuery($query, "update");

                    #$ins = "INSERT INTO ".$CFG['table']['indexbanner']." SET banner_photo = '".$photo."',addeddate = now() ";
                    #$res = $this->ExecuteQuery($ins, "insert");
                }
            }
            $this->redirectUrl("indexBannerManage.php");
        }

    }

    #--------------------------------------------------------------------------------
    #Edit Cuisine Name
    /**
     * AdminManagement::bannerEdit()
     * 
     * @return
     */
    function bannerEdit()
    {
        global $CFG, $admin_smarty, $objThumb;

        $resid              = $this->filterInput($resid);
        
        $imagesizedata = getimagesize($_FILES['banner_photo']['tmp_name']);
        if (isset($_FILES['banner_photo']['name']) && !empty($_FILES['banner_photo']['name']) && $imagesizedata == TRUE)
        {

            $getphotoname = $this->getValue("banner_photo", $CFG['table']['indexbanner'],
                "banner_id = '" . $resid . "' ");
            if (!empty($getphotoname))
            {
                @unlink($CFG['site']['photo_banner_path'] . '/' . $getphotoname);
            }

            $logoext = $this->getFileExtension($_FILES['banner_photo']['name']);
            $logoname = 'Image_banner_' . $resid .time()."." . $logoext;
            //$logoname  = $_FILES['banner_photo']['name'];
            $logoimage = "photo_". $logoname;
            $dest_name = $CFG['site']['photo_banner_path'] . '/' . $logoimage;

            $uploadsuccess = @move_uploaded_file($_FILES['banner_photo']['tmp_name'], $dest_name);
            @chmod($dest_name, 0777);

            if ($uploadsuccess)
            {
                #Get Thumbnail width & height
                $cuisinethumb = $this->iconSettingValues();

                #Create Thumbnail
                $sour_imagepath = $dest_name;
                $photo = "thumb_" . $logoname;

                $dest_imagepath = $CFG['site']['photo_banner_path'] . '/' . $photo;
                //$objThumb->createThumb($sour_imagepath,$dest_imagepath,255,210,'crop');
                $objThumb->createThumb($sour_imagepath, $dest_imagepath, 1348, 293, 'crop');

                unlink($dest_name);

                $query = "UPDATE " . $CFG['table']['indexbanner'] . " SET banner_photo = '" . $photo .
                    "' WHERE banner_id = '" . $resid . "' ";
                $res = $this->ExecuteQuery($query, "update");
            }
        }
        $this->redirectUrl("indexBannerManage.php");
    }
    #--------------------------------------------------------------------------------
    #Cuisine List manage
    /**
     * AdminManagement::indexBannerList()
     * 
     * @return
     */
    function indexBannerList()
    {
        global $CFG, $admin_smarty;

        $req_keyword        = $this->filterInput($_REQUEST['keyword']);

        if (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'casc')
        {
            $sort = " ORDER BY cuisine_name ASC";
            $fields .= "&sortby=casc";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'cdesc')
        {
            $sort = " ORDER BY cuisine_name DESC";
            $fields .= "&sortby=cdesc";
        } else
        {
            $sort .= " ORDER BY banner_id ASC";
        }

        #Status
        if (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'active')
        {
            $condition .= " AND banner_status = '1' ";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'deactive')
        {
            $condition .= " AND banner_status = '0' ";
        }

        if (isset($_REQUEST['limit']) && !empty($_REQUEST['limit']) && ($_REQUEST['limit'] !=
            "all"))
        {
            $limit = $_REQUEST['limit'];
            $fields = "&limit=$_REQUEST[limit]";
        } else
        {
            $limit = PAGELIMIT;
        }

        $page = $_REQUEST['page'];
        if ($page == 0)
            $page = 1;
        if ($page)
            $start = ($page - 1) * $limit;
        else
            $start = 0;

        if (!empty($_REQUEST['limit']) && ($_REQUEST['limit'] == "all"))
        {
            $sql_lim = $this->filterInput($_REQUEST['limit']);
        } else
        {
            $sql_lim = "$start, $limit";
        }

        #Keyword
        if (isset($req_keyword) && !empty($req_keyword))
        {
            $keyword = "&keyword=$_REQUEST[keyword]";
            $condition .= "AND banner_photo LIKE '%" . addslashes($req_keyword) .
                "%' ";
            $fields .= "&keyword=$_REQUEST[keyword]$fields";
        }


        $sql_sel = "SELECT banner_id, banner_photo, banner_status, addeddate FROM " . $CFG['table']['indexbanner'] .
            " WHERE banner_id IS NOT NULL $condition $sort";
        $total_pages = $this->ExecuteQuery($sql_sel, 'norows');

        $targetpage = "indexBannerManage.php";
        $next_page = $this->make_page($targetpage, $total_pages, $limit, $page, $fields);
        $sql_limit = $sql_sel . " LIMIT " . $sql_lim;
        $result = mysqli_query($this->DBCONN,$sql_limit) or die(mysqli_error($this->DBCONN));
        $cnt = 1;
        while ($row_seller = mysqli_fetch_array($result))
        {
            $row_seller['sno'] = (($page - 1) * $limit) + $cnt;
            $bannerList[] = $row_seller;
            $cnt++;
        }

        #From & To Records
        if ($page == 1)
        {
            $fromRecords = 1;
            $toRecords = $limit;
            if ($toRecords >= $total_pages)
                $toRecords = $total_pages;
        } else
        {
            $fromRecords = $start + 1;
            $toRecords = $start + $limit;
            if ($toRecords >= $total_pages)
                $toRecords = $total_pages;
        }


        $admin_smarty->assign("tablename", $CFG['table']['indexbanner']);
        $admin_smarty->assign("whereField", 'banner_id');
        $admin_smarty->assign("fieldname", 'banner_status');
        $admin_smarty->assign("word", 'Banner');
        $admin_smarty->assign("filename", 'indexBannerManage.php');
        $admin_smarty->assign("page", $page);

        $admin_smarty->assign("totalRecords", $total_pages);
        $admin_smarty->assign("fromRecords", $fromRecords);
        $admin_smarty->assign("toRecords", $toRecords);
        $admin_smarty->assign("limit", $limit);

        $admin_smarty->assign("bannerList", $bannerList);
        $admin_smarty->assign("pagination", $next_page);
    }
    //-------------------------------------------------------------------------------------------------------------------------------------------------
    //                                                      Customer Address Book
    //-------------------------------------------------------------------------------------------------------------------------------------------------
    /**
     * AdminManagement::addressBookDetailList()
     * 
     * @return
     */
    function addressBookDetailList()
    {
        global $CFG, $admin_smarty;

        $req_keyword  = $this->filterInput($_REQUEST['keyword']);
        $searchbookcustomerid  = $this->filterInput($_REQUEST['searchbookcustomerid']);
        $cusmid  = $this->filterInput($_GET['cusmid']);

        #echo "<pre>";print_r($_REQUEST);echo "</pre>";

        if (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'atasc')
        {
            $sort = " ORDER BY ad.customer_address_title ASC";
            $fields .= "&sortby=" . $_REQUEST['sortby'];
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'atdesc')
        {
            $sort = " ORDER BY ad.customer_address_title DESC";
            $fields .= "&sortby=" . $_REQUEST['sortby'];
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'cnasc')
        {
            $sort = " ORDER BY cus.customer_name ASC";
            $fields .= "&sortby=" . $_REQUEST['sortby'];
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'cndesc')
        {
            $sort = " ORDER BY cus.customer_name DESC";
            $fields .= "&sortby=" . $_REQUEST['sortby'];
        } else
        {
            $sort = " ORDER BY ad.customer_address_title ASC";
        }

        #$sort = " ORDER BY customer_name ASC";

        #Status
        if (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'active')
        {
            $condition .= " AND ad.status = '1' ";
            $fields .= "&sortby=" . $_REQUEST['sortby'];
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'deactive')
        {
            $condition .= " AND ad.status = '0' ";
            $fields .= "&sortby=" . $_REQUEST['sortby'];
        }

        if (isset($_REQUEST['limit']) && !empty($_REQUEST['limit']) && ($_REQUEST['limit'] !=
            "all"))
        {
            $limit = $_REQUEST['limit'];
            $fields = "&limit=$_REQUEST[limit]";
        } else
        {
            $limit = PAGELIMIT;
        }

        $page = $_REQUEST['page'];
        if ($page == 0)
            $page = 1;
        if ($page)
            $start = ($page - 1) * $limit;
        else
            $start = 0;

        if (!empty($_REQUEST['limit']) && ($_REQUEST['limit'] == "all"))
        {
            $sql_lim = $this->filterInput($_REQUEST['limit']);
        } else
        {
            $sql_lim = "$start, $limit";
        }

        #Keyword
        if (isset($req_keyword) && !empty($req_keyword))
        {
            $keyword = "&keyword=$_REQUEST[keyword]";
            $condition .= "AND ( ad.customer_address_title LIKE '%" . addslashes($req_keyword) . "%' OR cus.customer_email LIKE '%" . addslashes($req_keyword) . "%' ) ";
            $fields .= "&keyword=$_REQUEST[keyword]";
        }

        if (isset($cusmid) && !empty($cusmid))
        {

            $condition .= "AND ad.customer_id = '" . $cusmid . "' ";
            $fields .= "&ad.customer_id=" . $cusmid;
        }
        #search customer name
        if (isset($searchbookcustomerid) && !empty($searchbookcustomerid))
        {
            $cond .= " AND ad.customer_id = '" . $searchbookcustomerid . "' ";

            $admin_smarty->assign("searchbookcustomerid", $searchbookcustomerid);
        }

        /*$sql_sel = "SELECT ad.addressbook_id, ad.customer_id, ad.customer_address_type, ad.customer_address_title, ad.customer_company_name, ad.customer_city, ad.customer_district, ad.customer_zone, ad.address_status, ad.addeddate, ".
        " city.cityname".
        " FROM ".$CFG['table']['customer_addressbook']." AS ad ".
        " LEFT JOIN ".$CFG['table']['city']." AS city ON ad.customer_city = city.city_id ". 
        " WHERE ad.addressbook_id IS NOT NULL $condition $sort";*/
        /*
        $sql_sel = " SELECT ad.id, ad.customer_id, ad.customer_apartment_name, ad.customer_landmark, ad.customer_street, ad.customer_address_title, ad.customer_state, ad.customer_city, ad.customer_zip, ad.customer_landline, ad.customer_address_label, ad.status, ad.added_date,
        cus.customer_name, cus.customer_lastname, cty.cityname, state.statename, zip.zipcode, zip.areaname
        
        FROM 
        ".$CFG['table']['customer_addressbook']." AS ad ".
        " LEFT JOIN 
        ".$CFG['table']['customer']." AS cus ON ad.customer_id = cus.customer_id".
        " LEFT JOIN
        ".$CFG['table']['city']."  AS cty ON ad.customer_city = cty.city_id".
        " LEFT JOIN
        ".$CFG['table']['state']." AS state ON ad.customer_state = state.statecode".
        " LEFT JOIN
        ".$CFG['table']['zipcode']." AS zip ON ad.customer_zip = zip.zipcode_id".
        
        " WHERE 
        ad.customer_id IS NOT NULL $condition $cond $sort ";
        */
        //echo $sql_sel;
        /*	$sql_sel = "SELECT customer_id, customer_name, customer_street, customer_buildtype, customer_crossstreet, customer_zip, customer_city, customer_state, customer_phone, customer_addresslabel, customer_email, customer_password,status, addeddate FROM ".$CFG['table']['customer']." WHERE customer_id IS NOT NULL $condition $sort";*/

        $sql_sel =  " SELECT ad.id, ad.customer_id, ad.customer_apartment_name, ad.customer_landmark, ad.customer_street, ad.customer_address_title, ad.customer_state, ad.customer_city, ad.customer_zip, ad.customer_landline, ad.customer_address_label, ad.status, ad.added_date, ".
                    " cus.customer_id, cus.customer_email ".
                    " FROM " . $CFG['table']['customer_addressbook'] . " AS ad " . 
                    " LEFT JOIN " . $CFG['table']['customer'] . " AS cus ON cus.customer_id = ad.customer_id" .
                    " WHERE ad.customer_id IS NOT NULL AND cus.status = '1' $condition $cond $sort";


        #echo $sql_sel;
        $total_pages = $this->ExecuteQuery($sql_sel, 'norows');

        $targetpage = "addressBookManage.php";
        $next_page = $this->make_page($targetpage, $total_pages, $limit, $page, $fields);
        $sql_limit = $sql_sel . " LIMIT " . $sql_lim;
        $result = mysqli_query($this->DBCONN,$sql_limit) or die(mysqli_error($this->DBCONN));
        $cnt = 1;
        while ($row_seller = mysqli_fetch_array($result))
        {
            $row_seller['sno'] = (($page - 1) * $limit) + $cnt . ".";
            $row_seller['statename'] = $this->getValue("statename", $CFG['table']['state'],
                "statecode='" . $this->filterInput($row_seller['customer_state']) . "'");
            $row_seller['cityname'] = $this->getValue("cityname", $CFG['table']['city'],
                "city_id='" . $this->filterInput($row_seller['customer_city']) . "'");
            //$row_seller['zipcode'] 		= $this->getValue("zipcode",$CFG['table']['zipcode'],"zipcode_id='".$row_seller['customer_zip']."'" );
            $row_seller['cus_area'] = $this->getValue("areaname", $CFG['table']['zipcode'],
                "zipcode_id='" . $this->filterInput($row_seller['customer_zip']) . "'");
            $row_seller['customer_first_name'] = $this->getValue("customer_name", $CFG['table']['customer'],
                "customer_id='" . $this->filterInput($row_seller['customer_id']) . "'");
            $row_seller['customer_last_name'] = $this->getValue("customer_lastname", $CFG['table']['customer'],
                "customer_id='" . $this->filterInput($row_seller['customer_id']) . "'");
            $categoryList[] = $row_seller;
            $cnt++;
        }

        //echo "<pre>";print_r($categoryList);echo "</pre>"; die("Test");
        #From & To Records
        if ($page == 1)
        {
            $fromRecords = 1;
            $toRecords = $limit;
            if ($toRecords >= $total_pages)
                $toRecords = $total_pages;
        } else
        {
            $fromRecords = $start + 1;
            $toRecords = $start + $limit;
            if ($toRecords >= $total_pages)
                $toRecords = $total_pages;
        } 
        if (isset($_REQUEST['cusmid']) && !empty($_REQUEST['cusmid']))
        {
            $filename = 'addressBookManage.php?cusmid=' . $_REQUEST['cusmid'] . '';
        } else
        {
            $filename = 'addressBookManage.php';
        }
        if (isset($_REQUEST['searchbookcustomerid']) && !empty($_REQUEST['searchbookcustomerid']))
        {
            $filename = 'addressBookManage.php?cusmid=' . $_REQUEST['searchbookcustomerid'] . '';
        } else
        {
            $filename = 'addressBookManage.php';
        }

        //echo $filename;

        $admin_smarty->assign("tablename", $CFG['table']['customer_addressbook']);
        $admin_smarty->assign("whereField", 'id');
        $admin_smarty->assign("fieldname", 'status');
        $admin_smarty->assign("word", 'Address Book');
        $admin_smarty->assign("filename", $filename);
        $admin_smarty->assign("page", $page);

        $admin_smarty->assign("totalRecords", $total_pages);
        $admin_smarty->assign("fromRecords", $fromRecords);
        $admin_smarty->assign("toRecords", $toRecords);
        $admin_smarty->assign("limit", $limit);


        $admin_smarty->assign("addressBook_list", $categoryList);
        //$admin_smarty->assign("customer_zipcode", $customer_zipcode);
        $admin_smarty->assign("pagination", $next_page);

    }
    //Add New Customer Address Book
    /**
     * AdminManagement::addAddressBook()
     * 
     * @return
     */
    function addAddressBook()
    {
        global $CFG, $admin_smarty;

        $customer_id    = $this->filterInput($_REQUEST['cus_name']);
        $address_titile = $this->filterInput($_REQUEST['add_title']);
        $apartment_name = $this->filterInput($_REQUEST['apt_name']);
        $street_address = $this->filterInput($_REQUEST['street_add']);
        $state          = $this->filterInput($_REQUEST['cus_state']);
        $city           = $this->filterInput($_REQUEST['cus_city']);
        $zip            = $this->filterInput($_REQUEST['zip_code']);
        $landmark       = $this->filterInput($_REQUEST['landmark']);
        $landline       = $this->filterInput($_REQUEST['landline']);
        $address_label  = $this->filterInput($_REQUEST['customer_addresslabel_new']);

        if ($customer_id != '')
        {
            $ins_add = "INSERT INTO 
										" . $CFG['table']['customer_addressbook'] . "
									SET
										customer_id					= '" . $customer_id . "',
										customer_apartment_name 	= '" . $apartment_name . "',
										customer_landmark			= '" . $landmark . "',
										customer_street				= '" . $street_address . "',
										customer_address_title		= '" . $address_titile . "',
										customer_state				= '" . $state . "',
										customer_city				= '" . $city . "',	
										customer_zip				= '" . $zip . "',	
										customer_landline			= '" . $landline . "',
										customer_address_label		= '" . $address_label . "',
                                        added_date                  = '" . CUR_TIME . "'";
            $this->ExecuteQuery($ins_add, "insert");
            $this->redirectUrl("addressBookManage.php");
            die();
        }
    }
    //Edit Customer Address Book
    /**
     * AdminManagement::addressBookEdit()
     * 
     * @return
     */
    function addressBookEdit()
    {
        global $CFG, $admin_smarty;

        $address_id     = $this->filterInput($_REQUEST['addid']);
        $address_titile = $this->filterInput($_REQUEST['add_title']);
        $apartment_name = $this->filterInput($_REQUEST['apt_name']);
        $street_address = $this->filterInput($_REQUEST['street_add']);
        $state          = $this->filterInput($_REQUEST['cus_state']);
        $city           = $this->filterInput($_REQUEST['cus_city']);
        $zip            = $this->filterInput($_REQUEST['zip_code']);
        $landmark       = $this->filterInput($_REQUEST['landmark']);
        $landline       = $this->filterInput($_REQUEST['landline']);
        $address_label  = $this->filterInput($_REQUEST['customer_addresslabel_new']);

        if ($address_id != '')
        {
            $up_add = "UPDATE 
								" . $CFG['table']['customer_addressbook'] . "
							SET
								customer_apartment_name 	= '" . $apartment_name . "',
								customer_landmark			= '" . $landmark . "',
								customer_street				= '" . $street_address . "',
								customer_address_title		= '" . $address_titile . "',
								customer_state				= '" . $state . "',
								customer_city				= '" . $city . "',	
								customer_zip				= '" . $zip . "',	
								customer_landline			= '" . $landline . "',
								customer_address_label		= '" . $address_label . "'
						  WHERE
						  		id							= '" . $address_id . "'";
            $ok = $this->ExecuteQuery($up_add, 'update');
            $this->redirectUrl("addressBookManage.php");
            die();
        }

    }
    //Auto suggest zip code
    /**
     * AdminManagement::autoSuggestzip()
     * 
     * @return
     */
    function autoSuggestzip()
    {
        global $CFG, $objSmarty;
        //echo "<pre>";print_r($_REQUEST);echo "</pre>";
        $q = strtolower($this->filterInput($_REQUEST['term']));
        if (!isset($q))
            exit;

        $data = array();
        /*$sql = "SELECT zipcode FROM ".$CFG['table']['zipcode']." WHERE zipcode LIKE '".mysqli_real_escape_string($q)."%' AND zipcode_status='1' ORDER BY zipcode ASC ";
        $rs = mysqli_query($sql) or die(mysqli_error());
        if ( $rs && mysqli_num_rows($rs) )
        {
        while( $row = mysqli_fetch_array($rs, MYSQL_ASSOC) )
        {
        $data[] = array('label' => $row['zipcode'],'value' => $row['zipcode']);
        }
        }*/
        if (is_numeric($q))
        {
            $sql = "SELECT distinct(zipcode) FROM " . $CFG['table']['zipcode'] .
                " WHERE zipcode LIKE '" . mysqli_real_escape_string($q) .
                "%' AND zipcode_status='1' AND cityid = '" . $this->filterInput($_REQUEST['city']) .
                "' ORDER BY zipcode ASC ";
            $rs = mysqli_query($this->DBCONN,$sql) or die(mysqli_error($this->DBCONN));
            if ($rs && mysqli_num_rows($rs))
            {
                while ($row = mysqli_fetch_array($rs, MYSQL_ASSOC))
                {
                    $data[] = array('label' => $row['zipcode'], 'value' => $row['zipcode']);
                }
            }
        }
         /*else{
        $sql = "SELECT areaname FROM ".$CFG['table']['zipcode']." WHERE areaname LIKE '".mysqli_real_escape_string($q)."%' AND zipcode_status='1' ";
        $rs = mysqli_query($sql) or die(mysqli_error());
        if ( $rs && mysqli_num_rows($rs) )
        {
        while( $row = mysqli_fetch_array($rs, MYSQL_ASSOC) )
        {
        $data[] = array('label' => stripslashes($row['areaname']),'value' => stripslashes($row['areaname']));
        }
        }
        }*/
        $q1[]=$q;
        echo json_encode($data);
        flush();

    }
    /**
     * Auto Suggest Country
     * 
     */
    
    function autoSuggestcountry(){
    
        global $CFG;
        $q = strtolower($this->filterInput($_GET['term']));
        if (!isset($q))
            exit;
        $data = array();
               
        if (!is_numeric($q)){
        
            $sql = "SELECT `name`,`id_countries`,`iso_alpha2` FROM " . $CFG['table']['countries'] . 
                   " WHERE name LIKE '".$q."%'";
            $result = $this->ExecuteQuery($sql, 'select');
            
            if(is_array($result)){
            
                foreach($result as $key=>$value){
                
                    if(!empty($value)){
                    
                        $data[] = array('label' => $value['name'], 'value' =>$value['name']);
                        }
                        
                    } 
                }
             /** $rs = mysqli_query($this->DBCONN,$sql) or die(mysqli_error($this->DBCONN));
                    if ($rs && mysqli_num_rows($rs))
                    {
                        while ($row = mysqli_fetch_array($rs))
                        {
                            $data[] = array('label' => $row['name'], 'value' =>$row['name']);
                        }
                    } **/
            }
          
            echo json_encode($data);
            flush();
        
    }
     /**
     * Auto Suggest short
     * 
     */
    function autoSuggestcountryshort(){
    
        global $CFG;
        //echo "success";
        $_POST['country'];
        //$q = strtolower($_GET['term']);
        //if (!isset($q))
          //  exit;
        //$data = array();
        
        
       if (!is_numeric($_POST['country'])){
        
             $sql = "SELECT `name`,`id_countries`,`iso_alpha2` FROM " . $CFG['table']['countries'] . 
                   " WHERE name = '".$this->filterInput($_POST['country'])."'";
            $result = $this->ExecuteQuery($sql, 'select');
            //echo "<pre>";print_r($result);echo "</pre>";
            echo $result[0]['iso_alpha2'];
        }
            //$rs = mysqli_query($this->DBCONN,$sql) or die(mysqli_error($this->DBCONN));
                    
            /*if ($rs && mysqli_num_rows($rs)){
            
                while ($row = mysqli_fetch_array($rs)){
                
                    $data[] = array('label' => $row['iso_alpha2'], 'value' =>$row['iso_alpha2']);
                }
            }*/
            //$q1[]=$q;
            //echo json_encode($q1);
             
            //flush();
        
        
    }
    
    function autoSuggestsitezone(){
    
        global $CFG;
        $q=$this->filterInput($_POST['country']);
       
        $data = array();
        
        
        if (!is_numeric($q)){
            
            /*$sql ="SELECT `name`,`iso_alpha2`,`zone_name`  ".
                  " FROM ".$CFG['table']['countries']." AS co".
                  " LEFT JOIN ".$CFG['table']['zone']." AS zo ON co.iso_alpha2 = zo.country_code".
                  " WHERE co.name = '".$_GET['country']."' ";*/
            
            $sql = "SELECT `zone_name`,`country_code` FROM " . $CFG['table']['zone'] . 
                   " WHERE country_code = '".$this->filterInput($_POST['country'])."'";
            $result = $this->ExecuteQuery($sql, 'select');
            echo $result[0]['zone_name'];
            //echo "<pre>";print_r($result);echo "</pre>";
            $rs = mysqli_query($this->DBCONN,$sql) or die(mysqli_error($this->DBCONN));
            $rows=mysqli_num_rows($rs);
            if(is_array($result))
            {
                foreach($result as $key=>$value){
                
                    if(!empty($value)){
                         
                      $data[] = array('label' => $value['zone_name'], 'value' =>$value['zone_name']);
                    }
                        
                }
              
            }
            //$q1[]=$q;
            //echo json_encode($data);
             
           // flush(); 
  
        }
    
    }
    function autoSuggestsitezonec(){
    
        global $CFG;
        $q=$this->filterInput($_GET['country']);
       
        $data = array();
        
        
        if (!is_numeric($q)){
            
            /*$sql ="SELECT `name`,`iso_alpha2`,`zone_name`  ".
                  " FROM ".$CFG['table']['countries']." AS co".
                  " LEFT JOIN ".$CFG['table']['zone']." AS zo ON co.iso_alpha2 = zo.country_code".
                  " WHERE co.name = '".$_GET['country']."' ";*/
            
            $sql = " SELECT `zone_name`,`country_code` FROM " . $CFG['table']['zone'] . 
                   " WHERE country_code = '".$this->filterInput($_GET['country'])."'";
            $result = $this->ExecuteQuery($sql, 'select');
            //echo "<pre>";print_r($result);echo "</pre>";
            $rs = mysqli_query($this->DBCONN,$sql) or die(mysqli_error($this->DBCONN));
            $rows=mysqli_num_rows($rs);
            if(is_array($result))
            {
                foreach($result as $key=>$value){
                
                    if(!empty($value)){
                         
                      $data[] = array('label' => $value['zone_name'], 'value' =>$value['zone_name']);
                    }
                        
                }
              
            }
            //$q1[]=$q;
            echo json_encode($data);
             
            flush(); 
  
        }
    
    }
    function autoSuggestcurrency()
    {
    
       global $CFG;
        $q = strtolower($this->filterInput($_POST['currency']));
        if (!isset($q))
            exit;
        $data = array();
        //$data[] = array('label' => '1', 'value' => '2');
        
        if (!is_numeric($q)){
        
            $sql = "SELECT `name`,`currrency_symbol`,`currency_name` FROM " . $CFG['table']['countries'] .
            " WHERE `name` ='".$q."'";
            $result = $this->ExecuteQuery($sql, 'select');
            //echo "<pre>";print_r($result);echo "</pre>";
            echo $result[0]['currrency_symbol'];
        }
        
    }
    
    function autoSuggestcity()
    {
        global $CFG;
        $q = $this->filterInput($_GET['city']);
        
        if(!is_numeric($q))
        {
            $sql="SELECT `city_status`,`cityname` FROM ".$CFG['table']['city'].
                 " WHERE cityname LIKE '".$q."%' AND city_status = '1'";
            $result=$this->ExecuteQuery($sql,'select');
            if(is_array($result))
            {
                foreach($result as $key=>$value){
                
                    if(!empty($value)){
                         
                      $data[] = array('label' => $value['cityname'], 'value' =>$value['cityname']);
                    }
                        
                }
            }
            //$q1[]=$q;
            echo json_encode($data);
             
            flush(); 
  
        }
    }
    function autoSuggeststate()
    {
        global $CFG;
        $q = $this->filterInput($_POST['city']);
        
        if(!is_numeric($q))
        {
            $sql=   "SELECT `statename`".
            
                    " FROM ".$CFG['table']['city']."  AS c".

                    " LEFT JOIN " . $CFG['table']['state']." AS s ON c.statecode = s.statecode".
                    
                    " WHERE c.cityname= '".$this->filterInput($_POST['city'])."' ";

            $result=$this->ExecuteQuery($sql,'select');
            //echo "<pre>";print_r($result);echo "</pre>";
            echo $result[0]['statename'];
        }
    }
    
    function autoSuggestzipcode()
    {
        global $CFG;
        $q = $this->filterInput($_GET['city']);
        $q1[]=$q;
        
        
        if(!is_numeric($q))
        {
            $sql = "SELECT `zipcode` ,`areaname` ". 
                    
                    " FROM ".$CFG['table']['city']." AS c".

                    " LEFT JOIN " . $CFG['table']['zipcode']." AS s ON c.statecode = s.statecode".
                    
                    " WHERE c.cityname= '".$this->filterInput($_GET['city'])."' AND c.city_status = '1'  ";
                    
            $result=$this->ExecuteQuery($sql , 'select');
            if(is_array($result))
            {
                foreach($result as $key=>$value){
                
                    if(!empty($value)){
                         
                      $data[] = array('label' => $value['zipcode'], 'value' =>$value['zipcode']);
                    }
                        
                }
              
            }
           
            echo json_encode($data);
            flush();            
        }
    
    }
    
    #...............................................................................
    # News Letter List
    #-------------------------------------------------------------------------------
    /**
     * AdminManagement::newsLetterUserList()
     * 
     * @return
     */
    function newsLetterUserList()
    {
        global $CFG, $admin_smarty;

        $req_keyword   = $this->filterInput($_REQUEST['keyword']);
        #sort
        if (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'easc')
        {
            $sort = " ORDER BY customer_email  ASC";
            $fields .= "&sortby=easc";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'edesc')
        {
            $sort = " ORDER BY customer_email  DESC";
            $fields .= "&sortby=edesc";
        } else
        {
            $sort .= " ORDER BY customer_email ASC";
        }

        #Status
        if (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'active')
        {
            $condition .= " AND status = '1' ";
        } elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'deactive')
        {
            $condition .= " AND status = '0' ";
        }elseif (isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'pending')
        {
            $condition .= " AND status = '2' ";
        }

        if (isset($_REQUEST['limit']) && !empty($_REQUEST['limit']) && ($_REQUEST['limit'] !=
            "all"))
        {
            $limit = $_REQUEST['limit'];
            $fields = "&limit=$_REQUEST[limit]";
        } else
        {
            $limit = PAGELIMIT;
        }

        $page = $_REQUEST['page'];
        if ($page == 0)
            $page = 1;
        if ($page)
            $start = ($page - 1) * $limit;
        else
            $start = 0;

        if (!empty($_REQUEST['limit']) && ($_REQUEST['limit'] == "all"))
        {
            $sql_lim = $this->filterInput($_REQUEST['limit']);
        } else
        {
            $sql_lim = "$start, $limit";
        }

        #Keyword
        if (isset($req_keyword) && !empty($req_keyword))
        {
            $keyword = "&keyword=$_REQUEST[keyword]";
            $condition .= "AND customer_email LIKE '%" . addslashes($req_keyword) .
                "%' ";
            $fields .= "&keyword=$_REQUEST[keyword]$fields";
        }

        $sql_sel = "SELECT id,customer_id, customer_name, customer_lastname, customer_phone, customer_email, added_date FROM " .
            $CFG['table']['newsletter'] .
            " WHERE newsletter = 'Yes' $condition $sort";
        
        $total_pages = $this->ExecuteQuery($sql_sel, 'norows');

        $targetpage = "newsLetterManage.php";
        $next_page = $this->make_page($targetpage, $total_pages, $limit, $page, $fields);
        $sql_limit = $sql_sel . " LIMIT " . $sql_lim;
        $result = mysqli_query($this->DBCONN,$sql_limit) or die(mysqli_error($this->DBCONN));
        $cnt = 1;
        while ($row_seller = mysqli_fetch_array($result))
        {
            $row_seller['sno'] = (($page - 1) * $limit) + $cnt;
            $row_seller['added_date'] = $this->setDateFormatWithOutTime($row_seller['added_date']);
            $newsletterList[] = $row_seller;
            $cnt++;
        }

        #From & To Records
        if ($page == 1)
        {
            $fromRecords = 1;
            $toRecords = $limit;
            if ($toRecords >= $total_pages)
                $toRecords = $total_pages;
        } else
        {
            $fromRecords = $start + 1;
            $toRecords = $start + $limit;
            if ($toRecords >= $total_pages)
                $toRecords = $total_pages;
        }

        $admin_smarty->assign("tablename", $CFG['table']['newsletter']);
        $admin_smarty->assign("whereField", 'customer_id');
        $admin_smarty->assign("fieldname", 'status');
        $admin_smarty->assign("word", 'email');
        $admin_smarty->assign("filename", 'newsLetterManage.php');
        $admin_smarty->assign("page", $page);

        $admin_smarty->assign("totalRecords", $total_pages);
        $admin_smarty->assign("fromRecords", $fromRecords);
        $admin_smarty->assign("toRecords", $toRecords);
        $admin_smarty->assign("limit", $limit);

        $admin_smarty->assign("newsletterlist", $newsletterList);
        $admin_smarty->assign("pagination", $next_page);

    }
    #--------------------------------------------------------------------------------
    # Send Mail to all user
    #................................................................................
    #------------------------------------------------------------------------------------------------------------------
    /**
     * AdminManagement::sendNewsAllUser()
     * 
     * @return
     */
    function sendNewsAllUser()
    {
        global $CFG, $admin_smarty;

        if ($_REQUEST['flag'] == "all_site" && $_REQUEST['email'] == "All Users")
        {

            $qry = "SELECT customer_id, customer_email FROM " . $CFG['table']['customer'] .
                " WHERE newsletter = 'Yes' AND delete_status = 'No' AND customer_id IS NOT NULL";
            $rs = $this->ExecuteQuery($qry, "select");

            $c = count($rs);

            for ($i = 0; $i < count($rs); $i++)
            {
                $to_email = $rs[$i]['customer_email'];
                $frommail = $CFG['site']['adminemail'];

                $mailsubject = $_REQUEST['subject'];

                $mail_content = $this->readfilecontent($CFG['site']['emailtpl_path'] .
                    "/emailNews.tpl");
                $mail_content = str_replace('{CONFIG_SITEURL}', $CFG['site']['base_url'], "$mail_content");
                $mail_content = str_replace('{SITE_TITLE}', $CFG['site']['sitename'], "$mail_content");
                $mail_content = str_replace('{SITE_LOGO}', $CFG['site']['logoname'], $mail_content);
                $mail_content = str_replace('{CONFIG_IMAGEURL}', $CFG['site']['logoname'], "$mail_content");
                $mail_content = str_replace('{CONTENT}', $_REQUEST['content'], "$mail_content");

                $mailresult = $this->sendMail($mailHeader, $frommail, $to_email, $mailsubject, $mail_content);

                $admin_smarty->assign('SuccessMessage', "Messsage has been sent successfully!");
                
                //$this->redirectUrl("newsLetterManage.php");
            }
        } else
        {
            $email_id = explode(',', $_REQUEST['email']);
            $c = count($email_id);

            for ($i = 0; $i < $c; $i++)
            {
                $to_email = $email_id[$i];
                $frommail = $CFG['site']['adminemail'];

                $qry2 = "SELECT customer_email, customer_name FROM " . $CFG['table']['customer'] .
                    " WHERE customer_id='" . $to_email . "'";
                $re2 = $this->ExecuteQuery($qry2, "select");


                $mailsubject = $_REQUEST['subject'];
                $mail_content = $this->readfilecontent($CFG['site']['emailtpl_path'] .
                    "/emailNews.tpl");
                $mail_content = str_replace('{CONFIG_SITEURL}', $CFG['site']['base_url'], "$mail_content");
                $mail_content = str_replace('{SITE_TITLE}', $CFG['site']['sitename'], "$mail_content");
                $mail_content = str_replace('{SITE_LOGO}', $CFG['site']['logoname'], $mail_content);
                $mail_content = str_replace('{CONFIG_IMAGEURL}', $CFG['site']['logoname'], "$mail_content");
                $mail_content = str_replace('{CONTENT}', $_REQUEST['content'], "$mail_content");

                $mailresult = $this->sendMail($mailHeader, $frommail, $to_email, $mailsubject, $mail_content);

                $admin_smarty->assign("SuccessMessage", "Messsage has been sent successfully!");
                //$this->redirectUrl("newsLetterManage.php");
            }
        }
    }
    #---------------------------------------------------------------------------------------
    #Send Mail to Particualr User
    #---------------------------------------------------------------------------------------
    #send mail to particular
    /**
     * AdminManagement::sendNewsParticularUser()
     * 
     * @return
     */
    function sendNewsParticularUser()
    {
        global $CFG, $admin_smarty;

        if (is_array($_POST['Sel_Id']))
        {
            $selected = implode(",", $_POST['Sel_Id']);

            if ($selected != '')
            {
                 $SelQuery = "SELECT customer_email FROM " . $CFG['table']['newsletter'] ." WHERE id IN ($selected)";
                $res = $this->ExecuteQuery($SelQuery, "select");
                #$admin_smarty->assign("result_mail", $res);
                
                foreach($res as $key=>$value){
                    $new[] = $value['customer_email'];
                }
                $resNew = implode(',',$new); 
                #echo "mail->".$resNew;
                $admin_smarty->assign("result_mail", $resNew);
            }
        }
    }
    #---------------------------------------- Meta Tag Management ----------------------------------------

    #------------------------------------------------------------------------------------------------------

    /**
     * AdminManagement::list_dir_files()
     * 
     * @param mixed $dir
     * @return
     */
    function list_dir_files($dir)
    {

        if ($handle = opendir($dir))
        {
            // This is the correct way to loop over the directory.
            //$file = readdir($handle);


            while (false !== ($file = readdir($handle)))
            {

               // echo "file".$file;
                
               // $file_type = end(explode(".", $file)); // For getting file extension
                //$file_type = end(explode('.', $file)); // For getting file extension
                $file_type = (explode('.', $file));
                /*if($file_type[1] != ''){
                    $file_type = end(explode('.', $file));
                }*/
                //echo $file_type[1]."<br>";
                //echo "<pre>";print_r($file_type);echo "</pre>";

                if ($file != "." && $file != ".." && $file != ".svn" && $file != "admincp" && $file !=
                    "ajaxAction.php" && $file != "ajaxFile.php" && $file != "error404.php" && $file !=
                    "google38b3cff98df2d81d.html" && $file != "_phpinfo.php" && $file != "uploads" &&
                    $file != "theme" && $file != "includes" && $file != "reload.php" && $file !=
                    "searchResultGoogleMap.php" && $file != "cgi-bin" && $file != "__backup" && $file !=
                    "integration" && $file != "sitemap.xml" && $file != "twitter" && $file !=
                    "error_log" && $file != "staticPage.php" && $file != "offline.php" && $file !=
                    "backup" && $file != "emailtemplates" && $file != ".ftpquota" && $file !=
                    "ajaxActionRestaurant.php" && $file != "error.php" && $file != "paypal.php" && $file !=
                    "reportListPdf.php" && $file != "restaurantInvoicePDF.php" && $file !=
                    "restaurantInvoicePDF_content.php" && $file !=
                    "restaurantOwnerMyaccOpenCloseTime.php" && $file != "restaurant_innerpage1.php" &&
                    $file != "restaurant_innerpage2.php" && $file != "searchResultAjax.php" && $file !=
                    "restaurantDetails.php" && $file != "restaurantCuisineInnerpage.php" && $file !=
                    "viewfullDetailsPDF.php" && $file != "restaurantCityInnerpage.php" && $file !=
                    "restaurant_innerpage.php" && $file != "restaurant_innerpage_cuisine.php" && $file !=
                    "searchResult.php" && ($file_type[1] == "php"))
                {

                    $files_list[] = $file;
                }
            }
            closedir($handle);
        }
        
        #echo "<pre>";print_r($files_list);echo "</pre>";
        return $files_list;
    }

    #--------------------------------------------------------------------------------

    /**
     * AdminManagement::metatag_add_edit()
     * 
     * @return
     */
    function metatag_add_edit()
    {
        global $CFG, $admin_smarty, $objThumb;

        $filename = $this->filterInput($_POST['filename']);
        $metatag_title = $this->filterInput($_POST['metatag_title']);
        $metatag_keyword = $this->filterInput($_POST['metatag_keyword']);
        $metatag_desc = $this->filterInput($_POST['metatag_desc']);


        $filenamecnt = $this->getNumValues($CFG['table']['metatag'], "filename = '" . $filename .
            "' ");
        echo "<br>filenamecnt=>" . $filenamecnt;
        if ($filenamecnt == 0)
        {

            $ins_qry = "INSERT INTO 
								" . $CFG['table']['metatag'] . "
						    SET
                                filename        = '" . $filename . "',
						    	metatag_title  	= '" . $metatag_title . "',
						    	metatag_keyword	= '" . $metatag_keyword . "',
						    	metatag_desc  	= '" . $metatag_desc . "',
						    	addeddate   	= NOW() ";

            $res_qry = $this->ExecuteQuery($ins_qry, 'insert');
        } else
        {
            $up_qry = "UPDATE 
								" . $CFG['table']['metatag'] . "
						    SET
                                filename        = '" . $filename . "',
						    	metatag_title  	= '" . $metatag_title . "',
						    	metatag_keyword	= '" . $metatag_keyword . "',
						    	metatag_desc  	= '" . $metatag_desc . "',
						    	addeddate   	= NOW()
                                WHERE filename = '" . $filename . "'";

            $up_qry = $this->ExecuteQuery($up_qry, 'update');
        }
        $this->redirectUrl("metatagManage.php");
    }
}

?>