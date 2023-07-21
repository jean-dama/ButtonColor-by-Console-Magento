<?php
namespace NewButtonColor\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Magento\Framework\App\Config\Storage\WriterInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;

class ChangeButtonColor extends Command
{
    protected $configWriter;
    protected $scopeConfig;

    public function __construct(
        WriterInterface $configWriter,
        ScopeConfigInterface $scopeConfig
    ) {
        $this->configWriter = $configWriter;
        $this->scopeConfig = $scopeConfig;
        parent::__construct();
    }

    protected function configure()
    {
        $this->setName('changebuttoncolor:change')
            ->setDescription(__('Change button colors'))
            ->setHelp(__('This command allows you to change the button colors in Magento 2.'))
            ->addArgument('primary_color', InputArgument::REQUIRED, __('Primary button color (#FFFFFF)'))
            ->addArgument('secondary_color', InputArgument::REQUIRED, __('Secondary button color (#FFFFFF)'));
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $primaryColor = $input->getArgument('primary_color');
        $secondaryColor = $input->getArgument('secondary_color');

        if (!$this->isValidColor($primaryColor) || !$this->isValidColor($secondaryColor)) {
            $output->writeln(__('<error>Invalid color format. Please use hexadecimal color codes (#FFFFFF).</error>'));
            return;
        }

        // Atualiza as cores dos botoes de acordo com a configuracao
        $this->configWriter->save('design/button/primary', $primaryColor, ScopeConfigInterface::SCOPE_TYPE_DEFAULT, 0);
        $this->configWriter->save('design/button/secondary', $secondaryColor, ScopeConfigInterface::SCOPE_TYPE_DEFAULT, 0);

        $output->writeln(__('<info>Button colors have been updated successfully.</info>'));
    }

    protected function isValidColor($color)
    {
        // Validacao do codigo de cor
        return preg_match('/^#[A-Fa-f0-9]{6}$/', $color);
    }
}