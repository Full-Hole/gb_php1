<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211111090034 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, description VARCHAR(150) NOT NULL, img_link VARCHAR(50) NOT NULL, price DOUBLE PRECISION NOT NULL, ammount BIGINT NOT NULL, on_stock TINYINT(1) NOT NULL, is_deleted TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE images');
        $this->addSql('DROP TABLE products');
        $this->addSql('DROP TABLE reviews');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE images (id BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, img_path VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, views INT DEFAULT 0 NOT NULL, likes INT DEFAULT 0 NOT NULL, UNIQUE INDEX id (id), UNIQUE INDEX img_path (img_path), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE products (id BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, name VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, description VARCHAR(150) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, img_link VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, price DOUBLE PRECISION NOT NULL, ammount BIGINT DEFAULT 0 NOT NULL, on_stock TINYINT(1) DEFAULT \'0\' NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP, changed_at DATETIME DEFAULT CURRENT_TIMESTAMP, is_deleted TINYINT(1) DEFAULT \'0\', UNIQUE INDEX id (id), INDEX product_price (price), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'Продукты\' ');
        $this->addSql('CREATE TABLE reviews (id BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, review TEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, email VARCHAR(40) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, raiting TINYINT(1) DEFAULT \'0\' NOT NULL, author VARCHAR(45) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, cred_hidden TINYINT(1) DEFAULT \'0\' NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, UNIQUE INDEX id (id), UNIQUE INDEX id_UNIQUE (id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE product');
    }
}
