<?php

namespace App\Controllers\Admin;

use App\Controllers\Admin\AdminController;
use App\Models\Admin\AdminModel;
use App\Models\ProjectModel;
use App\Models\CategorieModel;
use CodeIgniter\API\ResponseTrait;


class Projects extends AdminController
{
    use ResponseTrait;

    public function index()
    {
        $AdminModel = new AdminModel();
        $avatar = $AdminModel->where('id', session('id'))->select('avatar')->first()['avatar'];

        $header = array(
            "title"=>"Projects",
            "navActive"=>"projects",
            "avatar"=>$avatar,
            "breadcrumb"=>array(),
            "authorisationCount"=>$AdminModel->count_pending_authorisations(),
        );


        $ProjectModel = new ProjectModel();
        
        $data = array(
            "projects"=>$ProjectModel->getProjectsData(),
        );
        
        echo view('admin/parts/header', $header);
        echo view('admin/projects', $data);
        echo view('admin/parts/footer');
    }

    public function new_project()
    {
        helper('form');

        $default = 'fr';
        $languages = array('fr', 'en', 'nl');
        
        $AdminModel = new AdminModel();
        $avatar = $AdminModel->where('id', session('id'))->select('avatar')->first()['avatar'];

        $header = array(
            "title"=>"New project",
            "navActive"=>"projects",
            "avatar"=>$avatar,
            "breadcrumb"=>array(
                array(
                    "title"=>"Projects",
                    "url"=>base_url('admin/projects'),
                )
            ),
            "authorisationCount"=>$AdminModel->count_pending_authorisations(),
        );
        
        $CategorieModel = new CategorieModel();

        $data = [
            'validation' => \Config\Services::validation(),
            'categories' => $CategorieModel->select('nameId, title')->findAll()
        ];

        echo view('admin/parts/header', $header);
        echo view('admin/project-add', $data);
        echo view('admin/parts/footer');
    }

    public function save_draft(){

        $validation =  \Config\Services::validation();
        $rules = [
            'categorieId' => [
                'label'  => 'Categorie',
                'rules'  => 'required|is_not_unique[categorie.nameId]',
                'errors' => [
                    'is_not_unique'=>'The {field} does not exist',
                    ]
            ],
            'titleFr' => [
                'label'  => 'Title',
                'rules'  => 'trim|required|required_name_id|valid_name_id[project.nameId]|is_unique[project.titleFr]|min_length[15]',
                'errors' => [
                    'valid_name_id'=> 'Similar {field} already exists',
                    'required_name_id' => '{field} should contain at least one alphabet'
                ]
            ],
            'descriptionFr' => [
                'label'  => 'Description',
                'rules'  => 'trim|required',
                'errors' => []
            ],
            'contentFr' => [
                'label'  => 'Content',
                'rules'  => 'required|min_length[15]',
                'errors' => []
            ],
            'titleEn' => [
                'label'  => 'Title ( EN )',
                'rules'  => 'trim',
                'errors' => []
            ],
            'descriptionEn' => [
                'label'  => 'Description ( EN )',
                'rules'  => 'trim',
                'errors' => []
            ],
            // 'contentEn' => [
            //     'label'  => 'Content ( EN )',
            //     'rules'  => 'min_length[15]',
            //     'errors' => []
            // ],
            'titleNl' => [
                'label'  => 'Title ( NL )',
                'rules'  => 'trim',
                'errors' => []
            ],
            'descriptionNl' => [
                'label'  => 'Description ( NL )',
                'rules'  => 'trim',
                'errors' => []
            ],
            // 'contentNl' => [
            //     'label'  => 'Content ( NL )',
            //     'rules'  => 'min_length[15]',
            //     'errors' => []
            // ],
            'thumbnail' => [
                'label'  => 'Thumbnail',
                'rules'  => 'uploaded[thumbnail]|max_size[thumbnail, 5120]|is_image[thumbnail]',
                'errors' => [
                    'uploaded'=> '{field} is required',
                    'is_image'=> '{field} is not an image.',
                ]
            ],
        ];

        if (! $this->validate($rules)){
            $this->new_project();
        }else{
            $ProjectModel = new ProjectModel();

            $data = $this->request->getPost();
            $file = $this->request->getFile('thumbnail');
            $file->move('./uploads/images');

            $thumbnail = 'uploads/images/' . $file->getName();

            $nameId = $this->string2nameid($data['titleFr']);

            $data['nameId'] = $nameId;
            $data['adminId'] = session('id');
            $data['thumbnail'] = $thumbnail;
            $data['type'] = 'draft';
            $ProjectModel->insert($data);
            // codeigniter redirect to update
        }        
    }

    public function publish()
    {
        $validation =  \Config\Services::validation();
        $rules = [
            'categorieId' => [
                'label'  => 'Categorie',
                'rules'  => 'required|is_not_unique[categorie.nameId]',
                'errors' => [
                    'is_not_unique'=>'The {field} does not exist',
                    ]
            ],
            'titleFr' => [
                'label'  => 'Title',
                'rules'  => 'trim|required|required_name_id|valid_name_id[project.nameId]|is_unique[project.titleFr]|min_length[15]',
                'errors' => [
                    'valid_name_id'=> 'Similar {field} already exists',
                    'required_name_id' => '{field} should contain at least one alphabet'
                ]
            ],
            'descriptionFr' => [
                'label'  => 'Description',
                'rules'  => 'trim|required',
                'errors' => []
            ],
            'contentFr' => [
                'label'  => 'Content',
                'rules'  => 'required|min_length[15]',
                'errors' => []
            ],
            'titleEn' => [
                'label'  => 'Title ( EN )',
                'rules'  => 'trim|required',
                'errors' => []
            ],
            'descriptionEn' => [
                'label'  => 'Description ( EN )',
                'rules'  => 'trim|required',
                'errors' => []
            ],
            'contentEn' => [
                'label'  => 'Content ( EN )',
                'rules'  => 'required|min_length[15]',
                'errors' => []
            ],
            'titleNl' => [
                'label'  => 'Title ( NL )',
                'rules'  => 'trim|required',
                'errors' => []
            ],
            'descriptionNl' => [
                'label'  => 'Description ( NL )',
                'rules'  => 'trim|required',
                'errors' => []
            ],
            'contentNl' => [
                'label'  => 'Content ( NL )',
                'rules'  => 'min_length[15]',
                'errors' => []
            ],
            'thumbnail' => [
                'label'  => 'Thumbnail',
                'rules'  => 'uploaded[thumbnail]|max_size[thumbnail, 5120]|is_image[thumbnail]',
                'errors' => [
                    'uploaded'=> '{field} is required',
                    'is_image'=> '{field} is not an image.',
                ]
            ],
        ];

        if (! $this->validate($rules)){
            $this->new_project();
        }else{
            $ProjectModel = new ProjectModel();

            $data = $this->request->getPost();
            $file = $this->request->getFile('thumbnail');
            $file->move('./uploads/images');

            $thumbnail = 'uploads/images/' . $file->getName();

            $nameId = $this->string2nameid($data['titleFr']);
            
            $data['nameId'] = $nameId;
            $data['adminId'] = session('id');
            $data['thumbnail'] = $thumbnail;
            $data['type'] = 'published';
            $ProjectModel->insert($data);
            // codeigniter redirec to update
        }  
    }

    public function update($projectNameID)
    {
        $AdminModel = new AdminModel();
        $avatar = $AdminModel->where('id', session('id'))->select('avatar')->first()['avatar'];

        $header = array(
            "title"=>"{$projectNameID} - Update",
            "navActive"=>"projects",
            "avatar"=>$avatar,
            "breadcrumb"=>array(
                array(
                    "title"=>"Projects",
                    "url"=>base_url('admin/projects')
                )
            ),
            "authorisationCount"=>$AdminModel->count_pending_authorisations(),
        );

        echo view('admin/parts/header', $header);
        echo view('admin/project-update');
        echo view('admin/parts/footer');
    }

    public function update_validation($projectNameID)
    {
        $AdminModel = new AdminModel();
        $avatar = $AdminModel->where('id', session('id'))->select('avatar')->first()['avatar'];

        $header = array(
            "title"=>"{$projectNameID} - Update",
            "navActive"=>"projects",
            "avatar"=>$avatar,
            "breadcrumb"=>array(
                array(
                    "title"=>"Projects",
                    "url"=>base_url('admin/projects')
                )
            ),
            "authorisationCount"=>$AdminModel->count_pending_authorisations(),
        );

        echo view('admin/parts/header', $header);
        echo view('admin/project-update');
        echo view('admin/parts/footer');
    }

    public function upload_image(){
        $responseArray = array();
        
        if ($this->request->getMethod() == 'post'){
            $rules = array(
                'upload' => array(
                    'rules' => 'uploaded[upload]|max_size[upload, 5120]|is_image[upload]',
                    'label' => 'my File'
                ),
            );

            if ($this->validate($rules)){
                
                $file = $this->request->getFile('upload');
                
                if ($file->isValid() and !$file->hasmoved()){
                    $file->move('./uploads/images');
                    $responseArray = array(
                        'url' => base_url('uploads/images/'.$file->getName()),
                    );
                
                }else{
                    /** file is NOT VALID why ? return what hapned. */
                    $responseArray = array(
                        "error" => array(
                            "message" => "The image upload failed. Unexpected error"
                        ),
                    );
                }
            }else{
                $responseArray = array(
                    "error" => array(
                        "message" => "The image upload failed."
                    ),
                );   
            }
            return $this->respondCreated($responseArray);
        }else{
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        
    }

    public function preview_project(){
    }

    public function project_previewer(){
        echo '<link rel="stylesheet" type="text/css" href="http://dev.bathijs.local/admin-dashboard/CKeditor5/sample/content-styles.css">';
        echo '<script async charset="utf-8" src="//cdn.embedly.com/widgets/platform.js"></script>';
        echo '<div class="ck-content">';
        echo($_POST['contentFr']);
        echo '</div>';
    }

    public function delete($projectNameID)
    {
        $AdminModel = new AdminModel();
        $avatar = $AdminModel->where('id', session('id'))->select('avatar')->first()['avatar'];

        $header = array(
            "title"=>"{$projectNameID} - Delete",
            "navActive"=>"projects",
            "avatar"=>$avatar,
            "breadcrumb"=>array(
                array(
                    "title"=>"Projects",
                    "url"=>base_url('admin/projects')
                )
            ),
            "authorisationCount"=>$AdminModel->count_pending_authorisations(),
        );

        echo view('admin/parts/header', $header);
        echo view('admin/project-delete');
        echo view('admin/parts/footer');
    }

    function string2nameid($string){
        // remove accents
        $chars = array(
            // Decompositions for Latin-1 Supplement
            chr(195).chr(128) => 'A', chr(195).chr(129) => 'A',
            chr(195).chr(130) => 'A', chr(195).chr(131) => 'A',
            chr(195).chr(132) => 'A', chr(195).chr(133) => 'A',
            chr(195).chr(135) => 'C', chr(195).chr(136) => 'E',
            chr(195).chr(137) => 'E', chr(195).chr(138) => 'E',
            chr(195).chr(139) => 'E', chr(195).chr(140) => 'I',
            chr(195).chr(141) => 'I', chr(195).chr(142) => 'I',
            chr(195).chr(143) => 'I', chr(195).chr(145) => 'N',
            chr(195).chr(146) => 'O', chr(195).chr(147) => 'O',
            chr(195).chr(148) => 'O', chr(195).chr(149) => 'O',
            chr(195).chr(150) => 'O', chr(195).chr(153) => 'U',
            chr(195).chr(154) => 'U', chr(195).chr(155) => 'U',
            chr(195).chr(156) => 'U', chr(195).chr(157) => 'Y',
            chr(195).chr(159) => 's', chr(195).chr(160) => 'a',
            chr(195).chr(161) => 'a', chr(195).chr(162) => 'a',
            chr(195).chr(163) => 'a', chr(195).chr(164) => 'a',
            chr(195).chr(165) => 'a', chr(195).chr(167) => 'c',
            chr(195).chr(168) => 'e', chr(195).chr(169) => 'e',
            chr(195).chr(170) => 'e', chr(195).chr(171) => 'e',
            chr(195).chr(172) => 'i', chr(195).chr(173) => 'i',
            chr(195).chr(174) => 'i', chr(195).chr(175) => 'i',
            chr(195).chr(177) => 'n', chr(195).chr(178) => 'o',
            chr(195).chr(179) => 'o', chr(195).chr(180) => 'o',
            chr(195).chr(181) => 'o', chr(195).chr(182) => 'o',
            chr(195).chr(182) => 'o', chr(195).chr(185) => 'u',
            chr(195).chr(186) => 'u', chr(195).chr(187) => 'u',
            chr(195).chr(188) => 'u', chr(195).chr(189) => 'y',
            chr(195).chr(191) => 'y',
            // Decompositions for Latin Extended-A
            chr(196).chr(128) => 'A', chr(196).chr(129) => 'a',
            chr(196).chr(130) => 'A', chr(196).chr(131) => 'a',
            chr(196).chr(132) => 'A', chr(196).chr(133) => 'a',
            chr(196).chr(134) => 'C', chr(196).chr(135) => 'c',
            chr(196).chr(136) => 'C', chr(196).chr(137) => 'c',
            chr(196).chr(138) => 'C', chr(196).chr(139) => 'c',
            chr(196).chr(140) => 'C', chr(196).chr(141) => 'c',
            chr(196).chr(142) => 'D', chr(196).chr(143) => 'd',
            chr(196).chr(144) => 'D', chr(196).chr(145) => 'd',
            chr(196).chr(146) => 'E', chr(196).chr(147) => 'e',
            chr(196).chr(148) => 'E', chr(196).chr(149) => 'e',
            chr(196).chr(150) => 'E', chr(196).chr(151) => 'e',
            chr(196).chr(152) => 'E', chr(196).chr(153) => 'e',
            chr(196).chr(154) => 'E', chr(196).chr(155) => 'e',
            chr(196).chr(156) => 'G', chr(196).chr(157) => 'g',
            chr(196).chr(158) => 'G', chr(196).chr(159) => 'g',
            chr(196).chr(160) => 'G', chr(196).chr(161) => 'g',
            chr(196).chr(162) => 'G', chr(196).chr(163) => 'g',
            chr(196).chr(164) => 'H', chr(196).chr(165) => 'h',
            chr(196).chr(166) => 'H', chr(196).chr(167) => 'h',
            chr(196).chr(168) => 'I', chr(196).chr(169) => 'i',
            chr(196).chr(170) => 'I', chr(196).chr(171) => 'i',
            chr(196).chr(172) => 'I', chr(196).chr(173) => 'i',
            chr(196).chr(174) => 'I', chr(196).chr(175) => 'i',
            chr(196).chr(176) => 'I', chr(196).chr(177) => 'i',
            chr(196).chr(178) => 'IJ',chr(196).chr(179) => 'ij',
            chr(196).chr(180) => 'J', chr(196).chr(181) => 'j',
            chr(196).chr(182) => 'K', chr(196).chr(183) => 'k',
            chr(196).chr(184) => 'k', chr(196).chr(185) => 'L',
            chr(196).chr(186) => 'l', chr(196).chr(187) => 'L',
            chr(196).chr(188) => 'l', chr(196).chr(189) => 'L',
            chr(196).chr(190) => 'l', chr(196).chr(191) => 'L',
            chr(197).chr(128) => 'l', chr(197).chr(129) => 'L',
            chr(197).chr(130) => 'l', chr(197).chr(131) => 'N',
            chr(197).chr(132) => 'n', chr(197).chr(133) => 'N',
            chr(197).chr(134) => 'n', chr(197).chr(135) => 'N',
            chr(197).chr(136) => 'n', chr(197).chr(137) => 'N',
            chr(197).chr(138) => 'n', chr(197).chr(139) => 'N',
            chr(197).chr(140) => 'O', chr(197).chr(141) => 'o',
            chr(197).chr(142) => 'O', chr(197).chr(143) => 'o',
            chr(197).chr(144) => 'O', chr(197).chr(145) => 'o',
            chr(197).chr(146) => 'OE',chr(197).chr(147) => 'oe',
            chr(197).chr(148) => 'R',chr(197).chr(149) => 'r',
            chr(197).chr(150) => 'R',chr(197).chr(151) => 'r',
            chr(197).chr(152) => 'R',chr(197).chr(153) => 'r',
            chr(197).chr(154) => 'S',chr(197).chr(155) => 's',
            chr(197).chr(156) => 'S',chr(197).chr(157) => 's',
            chr(197).chr(158) => 'S',chr(197).chr(159) => 's',
            chr(197).chr(160) => 'S', chr(197).chr(161) => 's',
            chr(197).chr(162) => 'T', chr(197).chr(163) => 't',
            chr(197).chr(164) => 'T', chr(197).chr(165) => 't',
            chr(197).chr(166) => 'T', chr(197).chr(167) => 't',
            chr(197).chr(168) => 'U', chr(197).chr(169) => 'u',
            chr(197).chr(170) => 'U', chr(197).chr(171) => 'u',
            chr(197).chr(172) => 'U', chr(197).chr(173) => 'u',
            chr(197).chr(174) => 'U', chr(197).chr(175) => 'u',
            chr(197).chr(176) => 'U', chr(197).chr(177) => 'u',
            chr(197).chr(178) => 'U', chr(197).chr(179) => 'u',
            chr(197).chr(180) => 'W', chr(197).chr(181) => 'w',
            chr(197).chr(182) => 'Y', chr(197).chr(183) => 'y',
            chr(197).chr(184) => 'Y', chr(197).chr(185) => 'Z',
            chr(197).chr(186) => 'z', chr(197).chr(187) => 'Z',
            chr(197).chr(188) => 'z', chr(197).chr(189) => 'Z',
            chr(197).chr(190) => 'z', chr(197).chr(191) => 's'
        );
        if ( preg_match('/[\x80-\xff]/', $string) ){
            $string = strtr($string, $chars);
        }

        $nameId = strtolower($string);
        $nameId = preg_replace('/[^a-z\ ]/', ' ', $nameId);
        $nameId = trim($nameId) ;
        $nameId = preg_replace('/\s+/', ' ', $nameId);
        $nameId = str_replace(' ', '-', $nameId);
        return $nameId;
    }
}
