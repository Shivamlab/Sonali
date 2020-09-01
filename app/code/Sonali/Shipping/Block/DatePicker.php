<?php namespace Sonali\Shipping\Block;
 
class DatePicker extends \Magento\Config\Block\System\Config\Form\Field
{
    protected $_coreRegistry;
 
    public function __construct(
        \Magento\Backend\Block\Template\Context $context, 
        \Magento\Framework\Registry $coreRegistry, 
        array $data = []
    )
    {
        $this->_coreRegistry = $coreRegistry;
        parent::__construct($context, $data);
    }
 
    protected function _getElementHtml(\Magento\Framework\Data\Form\Element\AbstractElement $element) 
    {
        $html = $element->getElementHtml();
        if (!$this->_coreRegistry->registry('datepicker_loaded')) {
            $this->_coreRegistry->registry('datepicker_loaded', 1);
        }
        $html .= '<button type="button" class="custom-ui-datepicker-trigger"></button>';
        
        $html .= '<script type="text/javascript">
            require(["jquery", "jquery/ui"], function (jq) {
                jq(document).ready(function () {
                    jq("#' . $element->getHtmlId() . '").datepicker( { dateFormat: "dd/mm/yy" } );
                    jq(".custom-ui-datepicker-trigger").removeAttr("style");
                    jq(".custom-ui-datepicker-trigger").click(function(){
                        jq("#' . $element->getHtmlId() . '").focus();
                    });
                });
            });
            </script>';
        $html .= '<style>
		.action-default, button, .block-footer .action-add, .block-footer .action-add {
    background: #FFF;
        background-image: none;
    border-color: #FFF;
}
.action-default:hover, button:hover, .action-default:active, button:active, .action-default:focus, button:focus, .block-footer .action-add:hover, .block-footer .action-add:active, .block-footer .action-add:focus {
    background-color: #FFF;
    color: #FFF;
    text-decoration: none;
}

            .custom-ui-datepicker-trigger {
                background-image: none;
                background:  ;
                -moz-box-sizing: content-box;
                border: ;
                box-shadow: none;
                line-height: inherit;
                margin: ;
                padding: ;
                text-shadow: none;
                font-weight: 400;
                text-decoration: none;
                display: inline-block;
                vertical-align: middle;
                position: relative;
            }
            .custom-ui-datepicker-trigger::after {
                -webkit-font-smoothing: antialiased;
                -moz-osx-font-smoothing: grayscale;
                font-size: 42px;
                line-height: 30px;
                color: #514943;
                content: "\e612";
                font-family: "icons-blank-theme";
                vertical-align: middle;
                display: inline-block;
                font-weight: 400;
                overflow: hidden;
                speak: none;
                text-align: center;
                position: absolute;
                top: -5px;
                right: ;
            }
            .custom-ui-datepicker-trigger > span {
                border: ;
                clip: rect(0,0,0,0);
                height: 1px;
                margin: -1px;
                overflow: hidden;
                padding: ;
                position: absolute;
                width: 1px;
            }
            </style>';
        return $html;
    }
}