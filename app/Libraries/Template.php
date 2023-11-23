<?php

namespace App\Libraries;

/**
 * Name:    ci4-template-view
 *
 * Created: 06.03.2020
 *
 * Description:
 *
 * Original Author: Not found
 *
 * Requirements: PHP7.2 or above
 *
 * @package    ci4-template-view
 * @author     Matheus Castro <matheuscastroweb@gmail.com>
 * @link       http://github.com/benedmunds/CodeIgniter-Ion-Auth
 * @filesource
 */
class Template
{

    /**
     * Contents page
     *
     * @var array
     */
    protected $templateData = [];

    /**
     * Set contents
     *
     * @param string $name  Variable name in the template
     * @param string $value Value to be passed to variable
     * @return void
     */
    private function set(string $name, string $data): void
    {
        $this->templateData[$name] = $data;
    }

    public function set_js($data): void
    {
        if (is_array($data)) {
            // New way of adding multiple scripts
            $this->templateData['scripts'] = isset($this->templateData['scripts'])
                ? array_merge_recursive($this->templateData['scripts'], $data)
                : $data;
        } else {
            // Old way of adding a single script
            $this->templateData['single_script'] = $data;
        }
    }


    /**
     * Loading template
     *
     * @param string $template  Path of template to be used
     * @param string $view      Path of view to be used
     * @param array  $view_data View parameters
     * @param array  $options   Options supported by the view function <https://codeigniter4.github.io/userguide/general/common_functions.html?highlight=view#view>
     * @return string
     */

    public function load_view_admin(string $view, $viewData, $options = []): string
    {
        $this->set('header', view('layouts/template/header'));
        $this->set('topbar', view('layouts/template/topbar'));
        $this->set('footer', view('layouts/template/footer'));
        $this->set('sidebar', view('layouts/template/sidebar'));
        $this->set('contents', view('layouts/Admin/' . $view, $viewData));
        return view('layouts/template/template', $this->templateData, $options);
    }

    // public function load_view_dashboard(string $view, $viewData, $options = []): string {
    //     $this->set('header', view('layouts/template/header'));
    //     $this->set('topbar', view('layouts/template/topbar'));
    //     $this->set('footer', view('layouts/template/footer_dashboard'));
    //     $this->set('contents', view('layouts/' . $view, $viewData));
    //     // Return template + view
    //     return view('layouts/template/template_dashboard', $this->templateData, $options);
    // }
}
