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
        $this->setName('custombuttoncolor:change')
            ->setDescription('Change button colors')
            ->setHelp('This command allows you to change the button colors in Magento 2.')
            ->addArgument('primary_color', InputArgument::REQUIRED, 'Primary button color (e.g., #FF0000)')
            ->addArgument('secondary_color', InputArgument::REQUIRED, 'Secondary button color (e.g., #00FF00)');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $primaryColor = $input->getArgument('primary_color');
        $secondaryColor = $input->getArgument('secondary_color');

        if (!$this->isValidColor($primaryColor) || !$this->isValidColor($secondaryColor)) {
            $output->writeln('<error>Invalid color format. Please use hexadecimal color codes (e.g., #FF0000).</error>');
            return;
        }

        // Update button colors in the configuration
        $this->configWriter->save('design/button/primary', $primaryColor, ScopeConfigInterface::SCOPE_TYPE_DEFAULT, 0);
        $this->configWriter->save('design/button/secondary', $secondaryColor, ScopeConfigInterface::SCOPE_TYPE_DEFAULT, 0);

        $output->writeln('<info>Button colors have been updated successfully.</info>');
    }

    protected function isValidColor($color)
    {
        // Add your validation logic here (e.g., regex to check for valid hexadecimal color code)
        return preg_match('/^#[A-Fa-f0-9]{6}$/', $color);
    }
}