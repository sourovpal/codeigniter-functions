$this->uri->segment(1)
$this->uri->segment(2)
$this->load->view('header');



public function uploadEpisodeMedia()

    {

        // die;

        if ($this->input->is_ajax_request()) {
            // move_uploaded_file($_FILES["upl"]["tmp_name"], "asset/temp_upload/myFile.png" );
            // exit;
            // $config['upload_path']   = temp_upload_path;
            $config['upload_path']   = 'asset/temp_upload/';

            $config['allowed_types'] = 'gif|jpg|png|jpeg|ttf|mp4|mp3|mkv|mov|zip|rar|doc|docx|3gp|ogg|wmv|webm|flv|avi|pdf|txt|srt|rtf|';

            $config['max_size'] = '0';  

            /*$config['max_width']  = '1024';

            $config['max_height']  = '768';*/

            $new_name                = strtotime(date('Y-m-d H:i:s')) . '_' . md5(uniqid(rand(), true)) . 'hello_Episode.png';

            $new_name                = substr($new_name, 0, 300);

            $config['file_name']     = $new_name;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('upl')) {

                $error = array(

                    'status' => 'error',

                    'error' => temp_upload_path

                );

                echo json_encode($error);

                exit;

            } else {

                

                $data = array(

                    'status' => 'success',

                    'upload_data' => $this->upload->data()

                );

                echo json_encode($data);

                exit;

            }

        } else {

            show_error("No direct access allowed");

            //or redirect to wherever you would like

        }

    }






