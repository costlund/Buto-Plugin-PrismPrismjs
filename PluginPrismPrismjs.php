<?php
/**
<p>
Add code highlightning from Prismjs.com by including CSS and Javascript.
</p>
<p>
Visit <a href="http://prismjs.com/" target="_blank">prismjs.com</a> for more info.
</p>
 */
class PluginPrismPrismjs{
  /**
  <p>
  Including CSS and Javascript in html/head section.
  </p>
  #code-yml#
  -
    type: widget
    data:
      plugin: 'prism/prismjs'
      method: include
  #code#
  <p>
  An element should be created like this. Use language-yaml, language-javascript or language-php.
  </p>
  #code-yml#
  -
    type: pre
    innerHTML:
      -
        type: code
        attribute:
          class: 'language-yaml'
        innerHTML: |
          test: 3323
          test2:
            - sfdsf
            - 3233
  #code#
  <p>
  If included in ajax run this javascript.
  </p>
  #code-javascript#
  Prism.highlightAll();
  #code#

  */
  public static function widget_include(){
    $element = array();
    $element[] = wfDocument::createHtmlElement('link', null, array('href' => '/plugin/prism/prismjs/prism.css', 'rel' => 'stylesheet', 'type' => 'text/css'));
    $element[] = wfDocument::createHtmlElement('script', null, array('src' => '/plugin/prism/prismjs/prism.js', 'type' => 'text/javascript'));
    
//    $element[] = wfDocument::createHtmlElement('link', null, array('src' => 'prism.css', 'rel' => 'stylesheet', 'type' => 'text/css'));
//    $element[] = wfDocument::createHtmlElement('script', null, array('src' => 'prism.js', 'type' => 'text/javascript'));
    
    wfDocument::renderElement($element);
  }


  public function page_testprism(){
    wfArray::set($GLOBALS, 'sys/layout_path', '/plugin/prism/prismjs/layout');
    $filename = wfArray::get($GLOBALS, 'sys/app_dir').'/plugin/prism/prismjs/page/testprism.yml';
    $page = wfFilesystem::loadYml($filename);
    wfDocument::mergeLayout($page);
  }

  
  
}