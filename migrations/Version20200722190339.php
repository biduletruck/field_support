<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200722190339 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categories (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, active TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE choices (id INT AUTO_INCREMENT NOT NULL, category_id INT DEFAULT NULL, sub_category_id INT DEFAULT NULL, user_id INT DEFAULT NULL, advisor_id INT DEFAULT NULL, created_at DATETIME NOT NULL, INDEX IDX_5CE963912469DE2 (category_id), INDEX IDX_5CE9639F7BFE87C (sub_category_id), INDEX IDX_5CE9639A76ED395 (user_id), INDEX IDX_5CE963966D3AD77 (advisor_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sub_categories (id INT AUTO_INCREMENT NOT NULL, category_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, active TINYINT(1) NOT NULL, INDEX IDX_1638D5A512469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE choices ADD CONSTRAINT FK_5CE963912469DE2 FOREIGN KEY (category_id) REFERENCES categories (id)');
        $this->addSql('ALTER TABLE choices ADD CONSTRAINT FK_5CE9639F7BFE87C FOREIGN KEY (sub_category_id) REFERENCES sub_categories (id)');
        $this->addSql('ALTER TABLE choices ADD CONSTRAINT FK_5CE9639A76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE choices ADD CONSTRAINT FK_5CE963966D3AD77 FOREIGN KEY (advisor_id) REFERENCES advisors (id)');
        $this->addSql('ALTER TABLE sub_categories ADD CONSTRAINT FK_1638D5A512469DE2 FOREIGN KEY (category_id) REFERENCES categories (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE choices DROP FOREIGN KEY FK_5CE963912469DE2');
        $this->addSql('ALTER TABLE sub_categories DROP FOREIGN KEY FK_1638D5A512469DE2');
        $this->addSql('ALTER TABLE choices DROP FOREIGN KEY FK_5CE9639F7BFE87C');
        $this->addSql('DROP TABLE categories');
        $this->addSql('DROP TABLE choices');
        $this->addSql('DROP TABLE sub_categories');
    }
}
