<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Excel_import_data extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('excel');
        $this->load->model('excel_import_model');

    }

    public function index()
    {
        $this->load->view('excel_import');
    }

    public function fetch()
    {
        $data = $this->excel_import_model->select();
        $output = "
        <div class='mt-5'>
           <h3 align='center'>Total Data : " . $data->num_rows() . "</h3>
           <table class='table table-striped table-bordered'>
           <tr>
           <th>id</th>
           <th>Name</th>
           </tr>
        ";
        if ($data->num_rows() > 0) {
            foreach ($data->result() as $row) {
                $output .= "
                <tr>
            <td>" . $row->id . "</td>
            <td>" . $row->name . "</td>
            </tr>
            ";
            }
        } else {
            $output .= "<tr>No data in the table</tr>";
        }
        $output .= "</table></div>";
        echo $output;
    }

    public function import()
    {

        if (isset($_FILES["file"]["name"])) {
            $path = $_FILES["file"]["tmp_name"];
            $object = PHPExcel_IOFactory::load($path);
            echo 'kjdgj';
            
            foreach ($object->getWorksheetIterator() as $worksheet) {
                $highestRow = $worksheet->getHighestRow();
                $highestColumn = $worksheet->getHighestColumn();
                for ($row = 2; $row <= $highestRow; $row++) {
                    $id = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                    $name = $worksheet->getCellByColumnAndRow(1, $row)->getValue();

                    $data[] = array(
                        'id' => $id,
                        'name' => $name,

                    );
                }
            }
            $this->excel_import_model->insert($data);
            echo 'Data Imported successfully';
        }
    }

}
