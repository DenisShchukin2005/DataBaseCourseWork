<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240730042303 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE company (id INT AUTO_INCREMENT NOT NULL, shop_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, location VARCHAR(255) NOT NULL, phone_number VARCHAR(255) NOT NULL, INDEX IDX_4FBF094F4D16C4DD (shop_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE company_product (company_id INT NOT NULL, product_id INT NOT NULL, INDEX IDX_F3181E7A979B1AD6 (company_id), INDEX IDX_F3181E7A4584665A (product_id), PRIMARY KEY(company_id, product_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE shop (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, location VARCHAR(255) NOT NULL, lon INT NOT NULL, lan INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE shop_product (shop_id INT NOT NULL, product_id INT NOT NULL, INDEX IDX_D07944874D16C4DD (shop_id), INDEX IDX_D07944874584665A (product_id), PRIMARY KEY(shop_id, product_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE company ADD CONSTRAINT FK_4FBF094F4D16C4DD FOREIGN KEY (shop_id) REFERENCES shop (id)');
        $this->addSql('ALTER TABLE company_product ADD CONSTRAINT FK_F3181E7A979B1AD6 FOREIGN KEY (company_id) REFERENCES company (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE company_product ADD CONSTRAINT FK_F3181E7A4584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE shop_product ADD CONSTRAINT FK_D07944874D16C4DD FOREIGN KEY (shop_id) REFERENCES shop (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE shop_product ADD CONSTRAINT FK_D07944874584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE company DROP FOREIGN KEY FK_4FBF094F4D16C4DD');
        $this->addSql('ALTER TABLE company_product DROP FOREIGN KEY FK_F3181E7A979B1AD6');
        $this->addSql('ALTER TABLE company_product DROP FOREIGN KEY FK_F3181E7A4584665A');
        $this->addSql('ALTER TABLE shop_product DROP FOREIGN KEY FK_D07944874D16C4DD');
        $this->addSql('ALTER TABLE shop_product DROP FOREIGN KEY FK_D07944874584665A');
        $this->addSql('DROP TABLE company');
        $this->addSql('DROP TABLE company_product');
        $this->addSql('DROP TABLE shop');
        $this->addSql('DROP TABLE shop_product');
    }
}
