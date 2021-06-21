<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210621235720 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE message');
        $this->addSql('DROP TABLE tickets');
        $this->addSql('DROP TABLE users');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE message (id BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, ticket_id INT NOT NULL, message_time DATETIME NOT NULL, user_id INT NOT NULL, UNIQUE INDEX id (id), INDEX ticket_id (ticket_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE tickets (id BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, subject VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, description VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, img VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, user_id INT NOT NULL, UNIQUE INDEX id (id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE users (user_id BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, email VARCHAR(50) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, password VARCHAR(256) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, session_id VARCHAR(256) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, session_time DATETIME DEFAULT NULL, UNIQUE INDEX email (email), UNIQUE INDEX id (user_id), PRIMARY KEY(user_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE user');
    }
}
