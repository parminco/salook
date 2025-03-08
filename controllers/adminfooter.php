<?php

class adminfooter extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->checkLoginAdminSession();
    }

    function index()
    {
        if (isset($_POST['description'])) {
            $this->model->editFooter($_POST, $_POST['footer_id']);
        }
        $footerInfo = $this->model->footerInfo();
        $data = [
            'footerInfo' => $footerInfo
        ];
        $this->view('admin/footer/editabout', $data, 1, 1);
    }

    function personnel()
    {

        $personnelInfo = $this->model->personnelInfo();
        $data = [
            'personnelInfo' => $personnelInfo
        ];
        $this->view('admin/footer/personnel', $data, 1, 1);
    }

    function addpersonnel()
    {

        if (isset($_POST['name'])) {
            $this->model->addPersonnel($_POST, $_FILES);
        }
        $this->view('admin/footer/addpersonnel', [], 1, 1);

    }

    function deletepersonnel($personnel_id)
    {
        $this->model->deletePersonnel($personnel_id);
    }


    function editpersonnel($personnel_id)
    {
        if (isset($_POST['name'])) {
            $this->model->editPersonnel($_POST, $_FILES, $personnel_id);
        }
        $personnelInfo = $this->model->personnelInfo2($personnel_id);
        $data = [
            'personnelInfo' => $personnelInfo
        ];
        $this->view('admin/footer/editpersonnel', $data, 1, 1);
    }

    function honors()
    {
        $honorsInfo = $this->model->honorsInfo();
        $data = [
            'honorsInfo' => $honorsInfo
        ];
        $this->view('admin/footer/honors', $data, 1, 1);
    }

    function addhonors()
    {
        if (isset($_POST['title'])) {
            $this->model->addHonors($_POST, $_FILES);
        }
        $this->view('admin/footer/addhonors', [], 1, 1);
    }

    function deletehonors($honors_id)
    {
        $this->model->deleteHonors($honors_id);
    }


    function edithonors($honors_id)
    {
        if (isset($_POST['title'])) {
            $this->model->editHonors($_POST, $_FILES, $honors_id);
        }
        $honorsInfo = $this->model->honorsInfo2($honors_id);
        $data = [
            'honorsInfo' => $honorsInfo
        ];
        $this->view('admin/footer/edithonors', $data, 1, 1);
    }

}

?>