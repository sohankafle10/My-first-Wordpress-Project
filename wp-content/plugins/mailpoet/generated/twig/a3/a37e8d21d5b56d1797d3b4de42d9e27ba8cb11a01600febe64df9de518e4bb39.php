<?php

if (!defined('ABSPATH')) exit;


use MailPoetVendor\Twig\Environment;
use MailPoetVendor\Twig\Error\LoaderError;
use MailPoetVendor\Twig\Error\RuntimeError;
use MailPoetVendor\Twig\Extension\CoreExtension;
use MailPoetVendor\Twig\Extension\SandboxExtension;
use MailPoetVendor\Twig\Markup;
use MailPoetVendor\Twig\Sandbox\SecurityError;
use MailPoetVendor\Twig\Sandbox\SecurityNotAllowedTagError;
use MailPoetVendor\Twig\Sandbox\SecurityNotAllowedFilterError;
use MailPoetVendor\Twig\Sandbox\SecurityNotAllowedFunctionError;
use MailPoetVendor\Twig\Source;
use MailPoetVendor\Twig\Template;

/* subscription/admin_user_status_field.html */
class __TwigTemplate_bc30f63e90e4af72d6b64117a2a449e6064c6cca5845a19f0b3f11086bad8f8c extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        yield from $this->unwrap()->yieldBlock('content', $context, $blocks);
        return; yield '';
    }

    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 2
        yield "<table class=\"form-table\">
  <tr>
    <th scope=\"row\">
      <label for=\"mailpoet_subscriber_status\">
        ";
        // line 6
        yield $this->extensions['MailPoet\Twig\I18n']->translate("MailPoet Subscriber Status", "mailpoet");
        yield "
      </label>
    </th>
    <td>
      <select name=\"mailpoet_subscriber_status\" id=\"mailpoet_subscriber_status\">
        <option value=\"";
        // line 11
        yield $this->env->getRuntime('MailPoetVendor\Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["statuses"] ?? null), "subscribed", [], "any", false, false, false, 11), "html", null, true);
        yield "\">
          ";
        // line 12
        yield $this->extensions['MailPoet\Twig\I18n']->translate("Subscribed", "mailpoet");
        yield "
        </option>

        ";
        // line 15
        if (($context["confirmationEnabled"] ?? null)) {
            // line 16
            yield "        <option value=\"";
            yield $this->env->getRuntime('MailPoetVendor\Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["statuses"] ?? null), "unconfirmed", [], "any", false, false, false, 16), "html", null, true);
            yield "\" selected=\"selected\">
          ";
            // line 17
            yield $this->extensions['MailPoet\Twig\I18n']->translate("Unconfirmed (will receive a confirmation email)", "mailpoet");
            yield "
        </option>
        ";
        }
        // line 20
        yield "
        <option value=\"";
        // line 21
        yield $this->env->getRuntime('MailPoetVendor\Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["statuses"] ?? null), "unsubscribed", [], "any", false, false, false, 21), "html", null, true);
        yield "\"
          ";
        // line 22
        if ( !($context["confirmationEnabled"] ?? null)) {
            yield "selected=\"selected\"";
        }
        yield ">
          ";
        // line 23
        yield $this->extensions['MailPoet\Twig\I18n']->translate("Unsubscribed", "mailpoet");
        yield "
        </option>
      </select>
    </td>
  </tr>
</table>
";
        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "subscription/admin_user_status_field.html";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo()
    {
        return array (  97 => 23,  91 => 22,  87 => 21,  84 => 20,  78 => 17,  73 => 16,  71 => 15,  65 => 12,  61 => 11,  53 => 6,  47 => 2,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "subscription/admin_user_status_field.html", "/home/circleci/mailpoet/mailpoet/views/subscription/admin_user_status_field.html");
    }
}
