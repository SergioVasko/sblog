<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20150516140928 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE Author (id INT AUTO_INCREMENT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, name VARCHAR(100) NOT NULL, slug VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Comment (id INT AUTO_INCREMENT NOT NULL, post_id INT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, authorName VARCHAR(100) NOT NULL, body LONGTEXT NOT NULL, INDEX IDX_5BC96BF04B89032C (post_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Post (id INT AUTO_INCREMENT NOT NULL, author_id INT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, slug VARCHAR(255) NOT NULL, title VARCHAR(150) NOT NULL, body LONGTEXT NOT NULL, INDEX IDX_FAB8C3B3F675F31B (author_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE Comment ADD CONSTRAINT FK_5BC96BF04B89032C FOREIGN KEY (post_id) REFERENCES Post (id)');
        $this->addSql('ALTER TABLE Post ADD CONSTRAINT FK_FAB8C3B3F675F31B FOREIGN KEY (author_id) REFERENCES Author (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE Post DROP FOREIGN KEY FK_FAB8C3B3F675F31B');
        $this->addSql('ALTER TABLE Comment DROP FOREIGN KEY FK_5BC96BF04B89032C');
        $this->addSql('DROP TABLE Author');
        $this->addSql('DROP TABLE Comment');
        $this->addSql('DROP TABLE Post');
    }
}
