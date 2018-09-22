
window.projectVersion = 'master';

(function(root) {

    var bhIndex = null;
    var rootPath = '';
    var treeHtml = '        <ul>                <li data-name="namespace:" class="opened">                    <div style="padding-left:0px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href=".html">[Global Namespace]</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:TencentAI" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="TencentAI.html">TencentAI</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:TencentAI" class="opened">                    <div style="padding-left:0px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="TencentAI.html">TencentAI</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:TencentAI_Console" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="TencentAI/Console.html">Console</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:TencentAI_Console_OCRCommand" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="TencentAI/Console/OCRCommand.html">OCRCommand</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:TencentAI_Exception" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="TencentAI/Exception.html">Exception</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:TencentAI_Exception_TencentAIException" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="TencentAI/Exception/TencentAIException.html">TencentAIException</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:TencentAI_Kernel" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="TencentAI/Kernel.html">Kernel</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:TencentAI_Kernel_Facade" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="TencentAI/Kernel/Facade.html">Facade</a>                    </div>                </li>                            <li data-name="class:TencentAI_Kernel_Request" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="TencentAI/Kernel/Request.html">Request</a>                    </div>                </li>                            <li data-name="class:TencentAI_Kernel_ServiceProvider" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="TencentAI/Kernel/ServiceProvider.html">ServiceProvider</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="class:TencentAI_Audio" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="TencentAI/Audio.html">Audio</a>                    </div>                </li>                            <li data-name="class:TencentAI_Face" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="TencentAI/Face.html">Face</a>                    </div>                </li>                            <li data-name="class:TencentAI_Image" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="TencentAI/Image.html">Image</a>                    </div>                </li>                            <li data-name="class:TencentAI_NaturalLanguageProcessing" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="TencentAI/NaturalLanguageProcessing.html">NaturalLanguageProcessing</a>                    </div>                </li>                            <li data-name="class:TencentAI_OCR" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="TencentAI/OCR.html">OCR</a>                    </div>                </li>                            <li data-name="class:TencentAI_Photo" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="TencentAI/Photo.html">Photo</a>                    </div>                </li>                            <li data-name="class:TencentAI_TencentAI" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="TencentAI/TencentAI.html">TencentAI</a>                    </div>                </li>                            <li data-name="class:TencentAI_Translate" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="TencentAI/Translate.html">Translate</a>                    </div>                </li>                </ul></div>                </li>                </ul>';

    var searchTypeClasses = {
        'Namespace': 'label-default',
        'Class': 'label-info',
        'Interface': 'label-primary',
        'Trait': 'label-success',
        'Method': 'label-danger',
        '_': 'label-warning'
    };

    var searchIndex = [
                    
            {"type": "Namespace", "link": ".html", "name": "", "doc": "Namespace "},{"type": "Namespace", "link": "TencentAI.html", "name": "TencentAI", "doc": "Namespace TencentAI"},{"type": "Namespace", "link": "TencentAI/Console.html", "name": "TencentAI\\Console", "doc": "Namespace TencentAI\\Console"},{"type": "Namespace", "link": "TencentAI/Exception.html", "name": "TencentAI\\Exception", "doc": "Namespace TencentAI\\Exception"},{"type": "Namespace", "link": "TencentAI/Kernel.html", "name": "TencentAI\\Kernel", "doc": "Namespace TencentAI\\Kernel"},
            
            {"type": "Class",  "link": "TencentAI.html", "name": "TencentAI", "doc": "&quot;&quot;"},
                    
            {"type": "Class", "fromName": "TencentAI", "fromLink": "TencentAI.html", "link": "TencentAI/Audio.html", "name": "TencentAI\\Audio", "doc": "&quot;Tencent AI \u8bed\u97f3\u8bc6\u522b\u80fd\u529b.&quot;"},
                                                        {"type": "Method", "fromName": "TencentAI\\Audio", "fromLink": "TencentAI/Audio.html", "link": "TencentAI/Audio.html#method_asr", "name": "TencentAI\\Audio::asr", "doc": "&quot;\u8bed\u97f3\u8bc6\u522b echo \u7248\uff1a\u63d0\u4f9b\u5728\u7ebf\u8bc6\u522b\u8bed\u97f3\u7684\u80fd\u529b\uff0c\u5bf9\u6574\u6bb5\u97f3\u9891\u8fdb\u884c\u8bc6\u522b\uff0c\u8bc6\u522b\u5b8c\u6210\u540e\uff0c\u5c06\u8fd4\u56de\u8bed\u97f3\u7684\u6587\u5b57\u5185\u5bb9.&quot;"},
                    {"type": "Method", "fromName": "TencentAI\\Audio", "fromLink": "TencentAI/Audio.html", "link": "TencentAI/Audio.html#method_asrs", "name": "TencentAI\\Audio::asrs", "doc": "&quot;\u8bed\u97f3\u8bc6\u522b \u6d41\u5f0f\u7248 AILab\uff1a\u63d0\u4f9b\u6d41\u5f0f\u8bc6\u522b\u8bed\u97f3\u7684\u80fd\u529b\uff0c\u53ef\u4ee5\u8f7b\u677e\u5b9e\u73b0\u8fb9\u5f55\u97f3\u8fb9\u8bc6\u522b.&quot;"},
                    {"type": "Method", "fromName": "TencentAI\\Audio", "fromLink": "TencentAI/Audio.html", "link": "TencentAI/Audio.html#method_wxasrs", "name": "TencentAI\\Audio::wxasrs", "doc": "&quot;\u8bed\u97f3\u8bc6\u522b \u6d41\u5f0f\u7248 WeChatAI\uff1a\u63d0\u4f9b\u6d41\u5f0f\u8bc6\u522b\u8bed\u97f3\u7684\u80fd\u529b\uff0c\u53ef\u4ee5\u8f7b\u677e\u5b9e\u73b0\u8fb9\u5f55\u97f3\u8fb9\u8bc6\u522b.&quot;"},
                    {"type": "Method", "fromName": "TencentAI\\Audio", "fromLink": "TencentAI/Audio.html", "link": "TencentAI/Audio.html#method_wxasrlong", "name": "TencentAI\\Audio::wxasrlong", "doc": "&quot;\u957f\u8bed\u97f3\u8bc6\u522b\uff1a\u4e0a\u4f20\u957f\u97f3\u9891\uff0c\u63d0\u4f9b\u56de\u8c03\u63a5\u53e3\uff0c\u5f02\u6b65\u83b7\u53d6\u8bc6\u522b\u7ed3\u679c.&quot;"},
                    {"type": "Method", "fromName": "TencentAI\\Audio", "fromLink": "TencentAI/Audio.html", "link": "TencentAI/Audio.html#method_detectKeyword", "name": "TencentAI\\Audio::detectKeyword", "doc": "&quot;\u5173\u952e\u8bcd\u68c0\u7d22 : \u4e0a\u4f20\u957f\u97f3\u9891\uff0c\u63d0\u4f9b\u56de\u8c03\u63a5\u53e3\uff0c\u5f02\u6b65\u83b7\u53d6\u8bc6\u522b\u7ed3\u679c.&quot;"},
                    {"type": "Method", "fromName": "TencentAI\\Audio", "fromLink": "TencentAI/Audio.html", "link": "TencentAI/Audio.html#method_tts", "name": "TencentAI\\Audio::tts", "doc": "&quot;\u8bed\u97f3\u5408\u6210 AILab\uff1a\u5c06\u6587\u5b57\u8f6c\u6362\u4e3a\u8bed\u97f3\uff0c\u8fd4\u56de\u6587\u5b57\u7684\u8bed\u97f3\u6570\u636e.&quot;"},
                    {"type": "Method", "fromName": "TencentAI\\Audio", "fromLink": "TencentAI/Audio.html", "link": "TencentAI/Audio.html#method_tta", "name": "TencentAI\\Audio::tta", "doc": "&quot;\u8bed\u97f3\u5408\u6210 \u4f18\u56fe\uff1a\u5c06\u6587\u5b57\u8f6c\u6362\u4e3a\u8bed\u97f3\uff0c\u8fd4\u56de\u6587\u5b57\u7684\u8bed\u97f3\u6570\u636e.&quot;"},
            
            {"type": "Class", "fromName": "TencentAI\\Console", "fromLink": "TencentAI/Console.html", "link": "TencentAI/Console/OCRCommand.html", "name": "TencentAI\\Console\\OCRCommand", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "TencentAI\\Console\\OCRCommand", "fromLink": "TencentAI/Console/OCRCommand.html", "link": "TencentAI/Console/OCRCommand.html#method_handle", "name": "TencentAI\\Console\\OCRCommand::handle", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "TencentAI\\Exception", "fromLink": "TencentAI/Exception.html", "link": "TencentAI/Exception/TencentAIException.html", "name": "TencentAI\\Exception\\TencentAIException", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "TencentAI\\Exception\\TencentAIException", "fromLink": "TencentAI/Exception/TencentAIException.html", "link": "TencentAI/Exception/TencentAIException.html#method___construct", "name": "TencentAI\\Exception\\TencentAIException::__construct", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "TencentAI\\Exception\\TencentAIException", "fromLink": "TencentAI/Exception/TencentAIException.html", "link": "TencentAI/Exception/TencentAIException.html#method___toString", "name": "TencentAI\\Exception\\TencentAIException::__toString", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "TencentAI\\Exception\\TencentAIException", "fromLink": "TencentAI/Exception/TencentAIException.html", "link": "TencentAI/Exception/TencentAIException.html#method_getExceptionAsArray", "name": "TencentAI\\Exception\\TencentAIException::getExceptionAsArray", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "TencentAI\\Exception\\TencentAIException", "fromLink": "TencentAI/Exception/TencentAIException.html", "link": "TencentAI/Exception/TencentAIException.html#method_getExceptionAsJson", "name": "TencentAI\\Exception\\TencentAIException::getExceptionAsJson", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "TencentAI", "fromLink": "TencentAI.html", "link": "TencentAI/Face.html", "name": "TencentAI\\Face", "doc": "&quot;Tencent AI \u4eba\u8138\u76f8\u5173\u80fd\u529b.&quot;"},
                                                        {"type": "Method", "fromName": "TencentAI\\Face", "fromLink": "TencentAI/Face.html", "link": "TencentAI/Face.html#method_detect", "name": "TencentAI\\Face::detect", "doc": "&quot;\u4eba\u8138\u5206\u6790\uff1a\u8bc6\u522b\u4e0a\u4f20\u56fe\u50cf\u4e0a\u9762\u7684\u4eba\u8138\u4fe1\u606f.&quot;"},
                    {"type": "Method", "fromName": "TencentAI\\Face", "fromLink": "TencentAI/Face.html", "link": "TencentAI/Face.html#method_multiDetect", "name": "TencentAI\\Face::multiDetect", "doc": "&quot;\u591a\u4eba\u8138\u68c0\u6d4b\uff1a\u8bc6\u522b\u4e0a\u4f20\u56fe\u50cf\u4e0a\u9762\u7684\u4eba\u8138\u4f4d\u7f6e\uff0c\u652f\u6301\u591a\u4eba\u8138\u8bc6\u522b.&quot;"},
                    {"type": "Method", "fromName": "TencentAI\\Face", "fromLink": "TencentAI/Face.html", "link": "TencentAI/Face.html#method_compare", "name": "TencentAI\\Face::compare", "doc": "&quot;\u4eba\u8138\u5bf9\u6bd4\uff1a\u5bf9\u8bf7\u6c42\u56fe\u7247\u8fdb\u884c\u4eba\u8138\u5bf9\u6bd4.&quot;"},
                    {"type": "Method", "fromName": "TencentAI\\Face", "fromLink": "TencentAI/Face.html", "link": "TencentAI/Face.html#method_detectCrossAge", "name": "TencentAI\\Face::detectCrossAge", "doc": "&quot;\u8de8\u5e74\u9f84\u4eba\u8138\u8bc6\u522b.&quot;"},
                    {"type": "Method", "fromName": "TencentAI\\Face", "fromLink": "TencentAI/Face.html", "link": "TencentAI/Face.html#method_shape", "name": "TencentAI\\Face::shape", "doc": "&quot;\u4e94\u5b98\u68c0\u6d4b\uff1a\u5bf9\u8bf7\u6c42\u56fe\u7247\u8fdb\u884c\u4e94\u5b98\u5b9a\u4f4d.&quot;"},
                    {"type": "Method", "fromName": "TencentAI\\Face", "fromLink": "TencentAI/Face.html", "link": "TencentAI/Face.html#method_identify", "name": "TencentAI\\Face::identify", "doc": "&quot;\u4eba\u8138\u8bc6\u522b.&quot;"},
                    {"type": "Method", "fromName": "TencentAI\\Face", "fromLink": "TencentAI/Face.html", "link": "TencentAI/Face.html#method_verify", "name": "TencentAI\\Face::verify", "doc": "&quot;\u4eba\u8138\u9a8c\u8bc1&quot;"},
                    {"type": "Method", "fromName": "TencentAI\\Face", "fromLink": "TencentAI/Face.html", "link": "TencentAI/Face.html#method_add", "name": "TencentAI\\Face::add", "doc": "&quot;\u4e2a\u4f53\u7ba1\u7406 =&gt; \u589e\u52a0\u4eba\u8138\uff1a\u5c06\u4e00\u4e2a\u6216\u4e00\u7ec4\u4eba\u8138\u52a0\u5165\u5230\u4e00\u4e2a\u4e2a\u4f53\u4e2d.&quot;"},
                    {"type": "Method", "fromName": "TencentAI\\Face", "fromLink": "TencentAI/Face.html", "link": "TencentAI/Face.html#method_delete", "name": "TencentAI\\Face::delete", "doc": "&quot;\u4e2a\u4f53\u7ba1\u7406 =&gt; \u5220\u9664\u4eba\u8138\uff1a\u4ece\u4e00\u4e2a\u4e2a\u4f53\u4e2d\u5220\u9664\u4e00\u4e2a\u6216\u4e00\u7ec4\u4eba\u8138.&quot;"},
                    {"type": "Method", "fromName": "TencentAI\\Face", "fromLink": "TencentAI/Face.html", "link": "TencentAI/Face.html#method_getList", "name": "TencentAI\\Face::getList", "doc": "&quot;\u83b7\u53d6\u4eba\u8138\u5217\u8868.&quot;"},
                    {"type": "Method", "fromName": "TencentAI\\Face", "fromLink": "TencentAI/Face.html", "link": "TencentAI/Face.html#method_getInfo", "name": "TencentAI\\Face::getInfo", "doc": "&quot;\u83b7\u53d6\u4eba\u8138\u4fe1\u606f.&quot;"},
                    {"type": "Method", "fromName": "TencentAI\\Face", "fromLink": "TencentAI/Face.html", "link": "TencentAI/Face.html#method_createPerson", "name": "TencentAI\\Face::createPerson", "doc": "&quot;\u4eba\u4f53\u521b\u5efa(\u5c5e\u4e8e\u4e00\u4e2a\u7ec4\uff0c\u6216\u591a\u4e2a\u7ec4).&quot;"},
                    {"type": "Method", "fromName": "TencentAI\\Face", "fromLink": "TencentAI/Face.html", "link": "TencentAI/Face.html#method_deletePerson", "name": "TencentAI\\Face::deletePerson", "doc": "&quot;\u5220\u9664\u4e2a\u4f53.&quot;"},
                    {"type": "Method", "fromName": "TencentAI\\Face", "fromLink": "TencentAI/Face.html", "link": "TencentAI/Face.html#method_setPersonInfo", "name": "TencentAI\\Face::setPersonInfo", "doc": "&quot;\u8bbe\u7f6e\u4e2a\u4f53\u4fe1\u606f\uff1a\u8bbe\u7f6e\u4e2a\u4f53\u7684\u540d\u5b57\u6216\u5907\u6ce8.&quot;"},
                    {"type": "Method", "fromName": "TencentAI\\Face", "fromLink": "TencentAI/Face.html", "link": "TencentAI/Face.html#method_getPersonInfo", "name": "TencentAI\\Face::getPersonInfo", "doc": "&quot;\u83b7\u53d6\u4e2a\u4f53\u4fe1\u606f.&quot;"},
                    {"type": "Method", "fromName": "TencentAI\\Face", "fromLink": "TencentAI/Face.html", "link": "TencentAI/Face.html#method_getGroupList", "name": "TencentAI\\Face::getGroupList", "doc": "&quot;\u83b7\u53d6\u7ec4\u5217\u8868.&quot;"},
                    {"type": "Method", "fromName": "TencentAI\\Face", "fromLink": "TencentAI/Face.html", "link": "TencentAI/Face.html#method_getPersonList", "name": "TencentAI\\Face::getPersonList", "doc": "&quot;\u83b7\u53d6\u4eba\u4f53\u5217\u8868.&quot;"},
            
            {"type": "Class", "fromName": "TencentAI", "fromLink": "TencentAI.html", "link": "TencentAI/Image.html", "name": "TencentAI\\Image", "doc": "&quot;Tencent AI \u56fe\u50cf\u76f8\u5173\u80fd\u529b.&quot;"},
                                                        {"type": "Method", "fromName": "TencentAI\\Image", "fromLink": "TencentAI/Image.html", "link": "TencentAI/Image.html#method_porn", "name": "TencentAI\\Image::porn", "doc": "&quot;\u667a\u80fd\u9274\u9ec4.&quot;"},
                    {"type": "Method", "fromName": "TencentAI\\Image", "fromLink": "TencentAI/Image.html", "link": "TencentAI/Image.html#method_terrorism", "name": "TencentAI\\Image::terrorism", "doc": "&quot;\u66b4\u6050\u8bc6\u522b.&quot;"},
                    {"type": "Method", "fromName": "TencentAI\\Image", "fromLink": "TencentAI/Image.html", "link": "TencentAI/Image.html#method_scener", "name": "TencentAI\\Image::scener", "doc": "&quot;\u7269\u4f53\u573a\u666f\u8bc6\u522b =&gt; \u573a\u666f\u8bc6\u522b.&quot;"},
                    {"type": "Method", "fromName": "TencentAI\\Image", "fromLink": "TencentAI/Image.html", "link": "TencentAI/Image.html#method_object", "name": "TencentAI\\Image::object", "doc": "&quot;\u7269\u4f53\u573a\u666f\u8bc6\u522b =&gt; \u7269\u4f53\u8bc6\u522b.&quot;"},
                    {"type": "Method", "fromName": "TencentAI\\Image", "fromLink": "TencentAI/Image.html", "link": "TencentAI/Image.html#method_tag", "name": "TencentAI\\Image::tag", "doc": "&quot;\u6807\u7b7e\u8bc6\u522b.&quot;"},
                    {"type": "Method", "fromName": "TencentAI\\Image", "fromLink": "TencentAI/Image.html", "link": "TencentAI/Image.html#method_identifyFlower", "name": "TencentAI\\Image::identifyFlower", "doc": "&quot;\u82b1\u8349\u8bc6\u522b.&quot;"},
                    {"type": "Method", "fromName": "TencentAI\\Image", "fromLink": "TencentAI/Image.html", "link": "TencentAI/Image.html#method_identifyVehicle", "name": "TencentAI\\Image::identifyVehicle", "doc": "&quot;\u8f66\u8f86\u8bc6\u522b.&quot;"},
                    {"type": "Method", "fromName": "TencentAI\\Image", "fromLink": "TencentAI/Image.html", "link": "TencentAI/Image.html#method_imageToText", "name": "TencentAI\\Image::imageToText", "doc": "&quot;\u770b\u56fe\u8bf4\u8bdd\uff1a\u7528\u4e00\u53e5\u8bdd\u6587\u5b57\u63cf\u8ff0\u56fe\u7247.&quot;"},
                    {"type": "Method", "fromName": "TencentAI\\Image", "fromLink": "TencentAI/Image.html", "link": "TencentAI/Image.html#method_fuzzy", "name": "TencentAI\\Image::fuzzy", "doc": "&quot;\u6a21\u7cca\u56fe\u7247\u68c0\u6d4b\uff1a\u5224\u65ad\u4e00\u4e2a\u56fe\u50cf\u7684\u6a21\u7cca\u7a0b\u5ea6.&quot;"},
                    {"type": "Method", "fromName": "TencentAI\\Image", "fromLink": "TencentAI/Image.html", "link": "TencentAI/Image.html#method_food", "name": "TencentAI\\Image::food", "doc": "&quot;\u7f8e\u98df\u56fe\u7247\u8bc6\u522b\uff1a\u8bc6\u522b\u4e00\u4e2a\u56fe\u50cf\u662f\u5426\u4e3a\u7f8e\u98df\u56fe\u50cf.&quot;"},
            
            {"type": "Class", "fromName": "TencentAI\\Kernel", "fromLink": "TencentAI/Kernel.html", "link": "TencentAI/Kernel/Facade.html", "name": "TencentAI\\Kernel\\Facade", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "TencentAI\\Kernel\\Facade", "fromLink": "TencentAI/Kernel/Facade.html", "link": "TencentAI/Kernel/Facade.html#method_getFacadeAccessor", "name": "TencentAI\\Kernel\\Facade::getFacadeAccessor", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "TencentAI\\Kernel", "fromLink": "TencentAI/Kernel.html", "link": "TencentAI/Kernel/Request.html", "name": "TencentAI\\Kernel\\Request", "doc": "&quot;\u53d1\u8d77\u7f51\u7edc\u8bf7\u6c42&quot;"},
                                                        {"type": "Method", "fromName": "TencentAI\\Kernel\\Request", "fromLink": "TencentAI/Kernel/Request.html", "link": "TencentAI/Kernel/Request.html#method_setAppKey", "name": "TencentAI\\Kernel\\Request::setAppKey", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "TencentAI\\Kernel\\Request", "fromLink": "TencentAI/Kernel/Request.html", "link": "TencentAI/Kernel/Request.html#method_setAppId", "name": "TencentAI\\Kernel\\Request::setAppId", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "TencentAI\\Kernel\\Request", "fromLink": "TencentAI/Kernel/Request.html", "link": "TencentAI/Kernel/Request.html#method_setRetry", "name": "TencentAI\\Kernel\\Request::setRetry", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "TencentAI\\Kernel\\Request", "fromLink": "TencentAI/Kernel/Request.html", "link": "TencentAI/Kernel/Request.html#method_setFormat", "name": "TencentAI\\Kernel\\Request::setFormat", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "TencentAI\\Kernel\\Request", "fromLink": "TencentAI/Kernel/Request.html", "link": "TencentAI/Kernel/Request.html#method_setCurl", "name": "TencentAI\\Kernel\\Request::setCurl", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "TencentAI\\Kernel\\Request", "fromLink": "TencentAI/Kernel/Request.html", "link": "TencentAI/Kernel/Request.html#method_close", "name": "TencentAI\\Kernel\\Request::close", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "TencentAI\\Kernel\\Request", "fromLink": "TencentAI/Kernel/Request.html", "link": "TencentAI/Kernel/Request.html#method_exec", "name": "TencentAI\\Kernel\\Request::exec", "doc": "&quot;\u903b\u8f91\u5904\u7406.&quot;"},
                    {"type": "Method", "fromName": "TencentAI\\Kernel\\Request", "fromLink": "TencentAI/Kernel/Request.html", "link": "TencentAI/Kernel/Request.html#method_returnStr", "name": "TencentAI\\Kernel\\Request::returnStr", "doc": "&quot;\u7ed3\u679c\u8fd4\u56de\u5b57\u7b26\u4e32\u5219\u629b\u51fa\u9519\u8bef.&quot;"},
            
            {"type": "Class", "fromName": "TencentAI\\Kernel", "fromLink": "TencentAI/Kernel.html", "link": "TencentAI/Kernel/ServiceProvider.html", "name": "TencentAI\\Kernel\\ServiceProvider", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "TencentAI\\Kernel\\ServiceProvider", "fromLink": "TencentAI/Kernel/ServiceProvider.html", "link": "TencentAI/Kernel/ServiceProvider.html#method_register", "name": "TencentAI\\Kernel\\ServiceProvider::register", "doc": "&quot;\u5728\u5bb9\u5668\u4e2d\u6ce8\u518c\u7ed1\u5b9a\u3002&quot;"},
                    {"type": "Method", "fromName": "TencentAI\\Kernel\\ServiceProvider", "fromLink": "TencentAI/Kernel/ServiceProvider.html", "link": "TencentAI/Kernel/ServiceProvider.html#method_boot", "name": "TencentAI\\Kernel\\ServiceProvider::boot", "doc": "&quot;\u5728\u6ce8\u518c\u540e\u8fdb\u884c\u670d\u52a1\u7684\u542f\u52a8\u3002&quot;"},
                    {"type": "Method", "fromName": "TencentAI\\Kernel\\ServiceProvider", "fromLink": "TencentAI/Kernel/ServiceProvider.html", "link": "TencentAI/Kernel/ServiceProvider.html#method_getConfigPath", "name": "TencentAI\\Kernel\\ServiceProvider::getConfigPath", "doc": "&quot;Get the config path.&quot;"},
                    {"type": "Method", "fromName": "TencentAI\\Kernel\\ServiceProvider", "fromLink": "TencentAI/Kernel/ServiceProvider.html", "link": "TencentAI/Kernel/ServiceProvider.html#method_provides", "name": "TencentAI\\Kernel\\ServiceProvider::provides", "doc": "&quot;\u83b7\u53d6\u63d0\u4f9b\u5668\u63d0\u4f9b\u7684\u670d\u52a1\u3002&quot;"},
            
            {"type": "Class", "fromName": "TencentAI", "fromLink": "TencentAI.html", "link": "TencentAI/NaturalLanguageProcessing.html", "name": "TencentAI\\NaturalLanguageProcessing", "doc": "&quot;Tencent AI \u81ea\u7136\u8bed\u8a00\u76f8\u5173\u80fd\u529b.&quot;"},
                                                        {"type": "Method", "fromName": "TencentAI\\NaturalLanguageProcessing", "fromLink": "TencentAI/NaturalLanguageProcessing.html", "link": "TencentAI/NaturalLanguageProcessing.html#method_wordseg", "name": "TencentAI\\NaturalLanguageProcessing::wordseg", "doc": "&quot;\u5206\u8bcd GBK.&quot;"},
                    {"type": "Method", "fromName": "TencentAI\\NaturalLanguageProcessing", "fromLink": "TencentAI/NaturalLanguageProcessing.html", "link": "TencentAI/NaturalLanguageProcessing.html#method_wordpos", "name": "TencentAI\\NaturalLanguageProcessing::wordpos", "doc": "&quot;\u8bcd\u6027\u6807\u6ce8 GBK.&quot;"},
                    {"type": "Method", "fromName": "TencentAI\\NaturalLanguageProcessing", "fromLink": "TencentAI/NaturalLanguageProcessing.html", "link": "TencentAI/NaturalLanguageProcessing.html#method_wordner", "name": "TencentAI\\NaturalLanguageProcessing::wordner", "doc": "&quot;\u4e13\u6709\u540d\u8bcd\u8bc6\u522b GBK.&quot;"},
                    {"type": "Method", "fromName": "TencentAI\\NaturalLanguageProcessing", "fromLink": "TencentAI/NaturalLanguageProcessing.html", "link": "TencentAI/NaturalLanguageProcessing.html#method_wordsyn", "name": "TencentAI\\NaturalLanguageProcessing::wordsyn", "doc": "&quot;\u540c\u4e49\u8bcd\u8bc6\u522b GBK.&quot;"},
                    {"type": "Method", "fromName": "TencentAI\\NaturalLanguageProcessing", "fromLink": "TencentAI/NaturalLanguageProcessing.html", "link": "TencentAI/NaturalLanguageProcessing.html#method_wordcom", "name": "TencentAI\\NaturalLanguageProcessing::wordcom", "doc": "&quot;\u8bed\u4e49\u89e3\u6790 =&gt; \u610f\u56fe\u6210\u5206\u8bc6\u522b.&quot;"},
                    {"type": "Method", "fromName": "TencentAI\\NaturalLanguageProcessing", "fromLink": "TencentAI/NaturalLanguageProcessing.html", "link": "TencentAI/NaturalLanguageProcessing.html#method_textPolar", "name": "TencentAI\\NaturalLanguageProcessing::textPolar", "doc": "&quot;\u60c5\u611f\u5206\u6790.&quot;"},
                    {"type": "Method", "fromName": "TencentAI\\NaturalLanguageProcessing", "fromLink": "TencentAI/NaturalLanguageProcessing.html", "link": "TencentAI/NaturalLanguageProcessing.html#method_chat", "name": "TencentAI\\NaturalLanguageProcessing::chat", "doc": "&quot;\u667a\u80fd\u95f2\u804a.&quot;"},
            
            {"type": "Class", "fromName": "TencentAI", "fromLink": "TencentAI.html", "link": "TencentAI/OCR.html", "name": "TencentAI\\OCR", "doc": "&quot;Tencent AI OCR \u80fd\u529b.&quot;"},
                                                        {"type": "Method", "fromName": "TencentAI\\OCR", "fromLink": "TencentAI/OCR.html", "link": "TencentAI/OCR.html#method_idCard", "name": "TencentAI\\OCR::idCard", "doc": "&quot;\u8eab\u4efd\u8bc1\u8bc6\u522b.&quot;"},
                    {"type": "Method", "fromName": "TencentAI\\OCR", "fromLink": "TencentAI/OCR.html", "link": "TencentAI/OCR.html#method_businessCard", "name": "TencentAI\\OCR::businessCard", "doc": "&quot;\u540d\u7247\u8bc6\u522b.&quot;"},
                    {"type": "Method", "fromName": "TencentAI\\OCR", "fromLink": "TencentAI/OCR.html", "link": "TencentAI/OCR.html#method_driverLicense", "name": "TencentAI\\OCR::driverLicense", "doc": "&quot;\u9a7e\u9a76\u8bc1\u8bc6\u522b.&quot;"},
                    {"type": "Method", "fromName": "TencentAI\\OCR", "fromLink": "TencentAI/OCR.html", "link": "TencentAI/OCR.html#method_drivingLicense", "name": "TencentAI\\OCR::drivingLicense", "doc": "&quot;\u884c\u9a76\u8bc1\u8bc6\u522b.&quot;"},
                    {"type": "Method", "fromName": "TencentAI\\OCR", "fromLink": "TencentAI/OCR.html", "link": "TencentAI/OCR.html#method_bizLicense", "name": "TencentAI\\OCR::bizLicense", "doc": "&quot;\u8425\u4e1a\u6267\u7167\u8bc6\u522b.&quot;"},
                    {"type": "Method", "fromName": "TencentAI\\OCR", "fromLink": "TencentAI/OCR.html", "link": "TencentAI/OCR.html#method_creditCard", "name": "TencentAI\\OCR::creditCard", "doc": "&quot;\u94f6\u884c\u5361\u8bc6\u522b.&quot;"},
                    {"type": "Method", "fromName": "TencentAI\\OCR", "fromLink": "TencentAI/OCR.html", "link": "TencentAI/OCR.html#method_general", "name": "TencentAI\\OCR::general", "doc": "&quot;\u901a\u7528\u8bc6\u522b.&quot;"},
                    {"type": "Method", "fromName": "TencentAI\\OCR", "fromLink": "TencentAI/OCR.html", "link": "TencentAI/OCR.html#method_plate", "name": "TencentAI\\OCR::plate", "doc": "&quot;\u8f66\u724c OCR.&quot;"},
                    {"type": "Method", "fromName": "TencentAI\\OCR", "fromLink": "TencentAI/OCR.html", "link": "TencentAI/OCR.html#method_handwriting", "name": "TencentAI\\OCR::handwriting", "doc": "&quot;\u624b\u5199\u4f53 OCR.&quot;"},
            
            {"type": "Class", "fromName": "TencentAI", "fromLink": "TencentAI.html", "link": "TencentAI/Photo.html", "name": "TencentAI\\Photo", "doc": "&quot;Tencent AI \u7167\u7247\u76f8\u5173\u80fd\u529b.&quot;"},
                                                        {"type": "Method", "fromName": "TencentAI\\Photo", "fromLink": "TencentAI/Photo.html", "link": "TencentAI/Photo.html#method_cosmetic", "name": "TencentAI\\Photo::cosmetic", "doc": "&quot;\u4eba\u8138\u7f8e\u5986 jpg png.&quot;"},
                    {"type": "Method", "fromName": "TencentAI\\Photo", "fromLink": "TencentAI/Photo.html", "link": "TencentAI/Photo.html#method_decoration", "name": "TencentAI\\Photo::decoration", "doc": "&quot;\u4eba\u8138\u53d8\u5986.&quot;"},
                    {"type": "Method", "fromName": "TencentAI\\Photo", "fromLink": "TencentAI/Photo.html", "link": "TencentAI/Photo.html#method_filter", "name": "TencentAI\\Photo::filter", "doc": "&quot;\u56fe\u7247\u6ee4\u955c\uff08\u5929\u5929P\u56fe\uff09.&quot;"},
                    {"type": "Method", "fromName": "TencentAI\\Photo", "fromLink": "TencentAI/Photo.html", "link": "TencentAI/Photo.html#method_aiLabFilter", "name": "TencentAI\\Photo::aiLabFilter", "doc": "&quot;\u56fe\u7247\u6ee4\u955c\uff08AI Lab\uff09.&quot;"},
                    {"type": "Method", "fromName": "TencentAI\\Photo", "fromLink": "TencentAI/Photo.html", "link": "TencentAI/Photo.html#method_merge", "name": "TencentAI\\Photo::merge", "doc": "&quot;\u4eba\u8138\u878d\u5408.&quot;"},
                    {"type": "Method", "fromName": "TencentAI\\Photo", "fromLink": "TencentAI/Photo.html", "link": "TencentAI/Photo.html#method_sticker", "name": "TencentAI\\Photo::sticker", "doc": "&quot;\u5927\u5934\u8d34.&quot;"},
                    {"type": "Method", "fromName": "TencentAI\\Photo", "fromLink": "TencentAI/Photo.html", "link": "TencentAI/Photo.html#method_age", "name": "TencentAI\\Photo::age", "doc": "&quot;\u989c\u9f84\u68c0\u6d4b.&quot;"},
            
            {"type": "Class", "fromName": "TencentAI", "fromLink": "TencentAI.html", "link": "TencentAI/TencentAI.html", "name": "TencentAI\\TencentAI", "doc": "&quot;Class TencentAI.&quot;"},
                                                        {"type": "Method", "fromName": "TencentAI\\TencentAI", "fromLink": "TencentAI/TencentAI.html", "link": "TencentAI/TencentAI.html#method_getInstance", "name": "TencentAI\\TencentAI::getInstance", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "TencentAI\\TencentAI", "fromLink": "TencentAI/TencentAI.html", "link": "TencentAI/TencentAI.html#method___call", "name": "TencentAI\\TencentAI::__call", "doc": "&quot;\u8fd4\u56de\u5bf9\u8c61&quot;"},
                    {"type": "Method", "fromName": "TencentAI\\TencentAI", "fromLink": "TencentAI/TencentAI.html", "link": "TencentAI/TencentAI.html#method___get", "name": "TencentAI\\TencentAI::__get", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "TencentAI\\TencentAI", "fromLink": "TencentAI/TencentAI.html", "link": "TencentAI/TencentAI.html#method_getVersion", "name": "TencentAI\\TencentAI::getVersion", "doc": "&quot;\u67e5\u770b\u7248\u672c\u53f7.&quot;"},
                    {"type": "Method", "fromName": "TencentAI\\TencentAI", "fromLink": "TencentAI/TencentAI.html", "link": "TencentAI/TencentAI.html#method_close", "name": "TencentAI\\TencentAI::close", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "TencentAI\\TencentAI", "fromLink": "TencentAI/TencentAI.html", "link": "TencentAI/TencentAI.html#method_audio", "name": "TencentAI\\TencentAI::audio", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "TencentAI\\TencentAI", "fromLink": "TencentAI/TencentAI.html", "link": "TencentAI/TencentAI.html#method_face", "name": "TencentAI\\TencentAI::face", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "TencentAI\\TencentAI", "fromLink": "TencentAI/TencentAI.html", "link": "TencentAI/TencentAI.html#method_image", "name": "TencentAI\\TencentAI::image", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "TencentAI\\TencentAI", "fromLink": "TencentAI/TencentAI.html", "link": "TencentAI/TencentAI.html#method_nlp", "name": "TencentAI\\TencentAI::nlp", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "TencentAI\\TencentAI", "fromLink": "TencentAI/TencentAI.html", "link": "TencentAI/TencentAI.html#method_ocr", "name": "TencentAI\\TencentAI::ocr", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "TencentAI\\TencentAI", "fromLink": "TencentAI/TencentAI.html", "link": "TencentAI/TencentAI.html#method_photo", "name": "TencentAI\\TencentAI::photo", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "TencentAI\\TencentAI", "fromLink": "TencentAI/TencentAI.html", "link": "TencentAI/TencentAI.html#method_translate", "name": "TencentAI\\TencentAI::translate", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "TencentAI", "fromLink": "TencentAI.html", "link": "TencentAI/Translate.html", "name": "TencentAI\\Translate", "doc": "&quot;TencentAI \u7ffb\u8bd1\u76f8\u5173\u80fd\u529b.&quot;"},
                                                        {"type": "Method", "fromName": "TencentAI\\Translate", "fromLink": "TencentAI/Translate.html", "link": "TencentAI/Translate.html#method_aILabText", "name": "TencentAI\\Translate::aILabText", "doc": "&quot;\u6587\u672c\u7ffb\u8bd1\uff08AI Lab\uff09.&quot;"},
                    {"type": "Method", "fromName": "TencentAI\\Translate", "fromLink": "TencentAI/Translate.html", "link": "TencentAI/Translate.html#method_text", "name": "TencentAI\\Translate::text", "doc": "&quot;\u6587\u672c\u7ffb\u8bd1\uff08\u7ffb\u8bd1\u541b\uff09.&quot;"},
                    {"type": "Method", "fromName": "TencentAI\\Translate", "fromLink": "TencentAI/Translate.html", "link": "TencentAI/Translate.html#method_image", "name": "TencentAI\\Translate::image", "doc": "&quot;\u56fe\u7247\u7ffb\u8bd1.&quot;"},
                    {"type": "Method", "fromName": "TencentAI\\Translate", "fromLink": "TencentAI/Translate.html", "link": "TencentAI/Translate.html#method_audio", "name": "TencentAI\\Translate::audio", "doc": "&quot;\u8bed\u97f3\u7ffb\u8bd1.&quot;"},
                    {"type": "Method", "fromName": "TencentAI\\Translate", "fromLink": "TencentAI/Translate.html", "link": "TencentAI/Translate.html#method_detect", "name": "TencentAI\\Translate::detect", "doc": "&quot;\u8bed\u79cd\u8bc6\u522b.&quot;"},
            
            
                                        // Fix trailing commas in the index
        {}
    ];

    /** Tokenizes strings by namespaces and functions */
    function tokenizer(term) {
        if (!term) {
            return [];
        }

        var tokens = [term];
        var meth = term.indexOf('::');

        // Split tokens into methods if "::" is found.
        if (meth > -1) {
            tokens.push(term.substr(meth + 2));
            term = term.substr(0, meth - 2);
        }

        // Split by namespace or fake namespace.
        if (term.indexOf('\\') > -1) {
            tokens = tokens.concat(term.split('\\'));
        } else if (term.indexOf('_') > 0) {
            tokens = tokens.concat(term.split('_'));
        }

        // Merge in splitting the string by case and return
        tokens = tokens.concat(term.match(/(([A-Z]?[^A-Z]*)|([a-z]?[^a-z]*))/g).slice(0,-1));

        return tokens;
    };

    root.Sami = {
        /**
         * Cleans the provided term. If no term is provided, then one is
         * grabbed from the query string "search" parameter.
         */
        cleanSearchTerm: function(term) {
            // Grab from the query string
            if (typeof term === 'undefined') {
                var name = 'search';
                var regex = new RegExp("[\\?&]" + name + "=([^&#]*)");
                var results = regex.exec(location.search);
                if (results === null) {
                    return null;
                }
                term = decodeURIComponent(results[1].replace(/\+/g, " "));
            }

            return term.replace(/<(?:.|\n)*?>/gm, '');
        },

        /** Searches through the index for a given term */
        search: function(term) {
            // Create a new search index if needed
            if (!bhIndex) {
                bhIndex = new Bloodhound({
                    limit: 500,
                    local: searchIndex,
                    datumTokenizer: function (d) {
                        return tokenizer(d.name);
                    },
                    queryTokenizer: Bloodhound.tokenizers.whitespace
                });
                bhIndex.initialize();
            }

            results = [];
            bhIndex.get(term, function(matches) {
                results = matches;
            });

            if (!rootPath) {
                return results;
            }

            // Fix the element links based on the current page depth.
            return $.map(results, function(ele) {
                if (ele.link.indexOf('..') > -1) {
                    return ele;
                }
                ele.link = rootPath + ele.link;
                if (ele.fromLink) {
                    ele.fromLink = rootPath + ele.fromLink;
                }
                return ele;
            });
        },

        /** Get a search class for a specific type */
        getSearchClass: function(type) {
            return searchTypeClasses[type] || searchTypeClasses['_'];
        },

        /** Add the left-nav tree to the site */
        injectApiTree: function(ele) {
            ele.html(treeHtml);
        }
    };

    $(function() {
        // Modify the HTML to work correctly based on the current depth
        rootPath = $('body').attr('data-root-path');
        treeHtml = treeHtml.replace(/href="/g, 'href="' + rootPath);
        Sami.injectApiTree($('#api-tree'));
    });

    return root.Sami;
})(window);

$(function() {

    // Enable the version switcher
    $('#version-switcher').change(function() {
        window.location = $(this).val()
    });

    
        // Toggle left-nav divs on click
        $('#api-tree .hd span').click(function() {
            $(this).parent().parent().toggleClass('opened');
        });

        // Expand the parent namespaces of the current page.
        var expected = $('body').attr('data-name');

        if (expected) {
            // Open the currently selected node and its parents.
            var container = $('#api-tree');
            var node = $('#api-tree li[data-name="' + expected + '"]');
            // Node might not be found when simulating namespaces
            if (node.length > 0) {
                node.addClass('active').addClass('opened');
                node.parents('li').addClass('opened');
                var scrollPos = node.offset().top - container.offset().top + container.scrollTop();
                // Position the item nearer to the top of the screen.
                scrollPos -= 200;
                container.scrollTop(scrollPos);
            }
        }

    
    
        var form = $('#search-form .typeahead');
        form.typeahead({
            hint: true,
            highlight: true,
            minLength: 1
        }, {
            name: 'search',
            displayKey: 'name',
            source: function (q, cb) {
                cb(Sami.search(q));
            }
        });

        // The selection is direct-linked when the user selects a suggestion.
        form.on('typeahead:selected', function(e, suggestion) {
            window.location = suggestion.link;
        });

        // The form is submitted when the user hits enter.
        form.keypress(function (e) {
            if (e.which == 13) {
                $('#search-form').submit();
                return true;
            }
        });

    
});


