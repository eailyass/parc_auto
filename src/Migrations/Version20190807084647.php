<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190807084647 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE vehicle_checkout (id INT AUTO_INCREMENT NOT NULL, vehicle_id INT NOT NULL, date_of_checkout DATE NOT NULL, description LONGTEXT DEFAULT NULL, type SMALLINT NOT NULL, mileage INT NOT NULL, components_changed JSON DEFAULT NULL COMMENT \'(DC2Type:json_array)\', total_cost DOUBLE PRECISION DEFAULT NULL, INDEX IDX_722A22DA545317D1 (vehicle_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vehicle_assignement (id INT AUTO_INCREMENT NOT NULL, vehicle_id INT NOT NULL, driver_id INT NOT NULL, date_ofassigning DATE NOT NULL, date_of_revoking DATE DEFAULT NULL, observation VARCHAR(255) DEFAULT NULL, INDEX IDX_6969CE1C545317D1 (vehicle_id), INDEX IDX_6969CE1CC3423909 (driver_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE driver (id INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(60) NOT NULL, last_name VARCHAR(60) NOT NULL, license_number VARCHAR(255) NOT NULL, birthday DATE DEFAULT NULL, title VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vehicle (id INT AUTO_INCREMENT NOT NULL, make VARCHAR(255) NOT NULL, model VARCHAR(255) NOT NULL, date_of_circulation DATE NOT NULL, date_of_acquisition DATE NOT NULL, immatriculation_number VARCHAR(255) NOT NULL, grey_card_number VARCHAR(255) NOT NULL, type VARCHAR(255) DEFAULT NULL, availability TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sinister (id INT AUTO_INCREMENT NOT NULL, vehicle_id INT NOT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, date_of_sinister DATE NOT NULL, damage_estimation DOUBLE PRECISION DEFAULT NULL, INDEX IDX_73FC7B36545317D1 (vehicle_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE vehicle_checkout ADD CONSTRAINT FK_722A22DA545317D1 FOREIGN KEY (vehicle_id) REFERENCES vehicle (id)');
        $this->addSql('ALTER TABLE vehicle_assignement ADD CONSTRAINT FK_6969CE1C545317D1 FOREIGN KEY (vehicle_id) REFERENCES vehicle (id)');
        $this->addSql('ALTER TABLE vehicle_assignement ADD CONSTRAINT FK_6969CE1CC3423909 FOREIGN KEY (driver_id) REFERENCES driver (id)');
        $this->addSql('ALTER TABLE sinister ADD CONSTRAINT FK_73FC7B36545317D1 FOREIGN KEY (vehicle_id) REFERENCES vehicle (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE vehicle_assignement DROP FOREIGN KEY FK_6969CE1CC3423909');
        $this->addSql('ALTER TABLE vehicle_checkout DROP FOREIGN KEY FK_722A22DA545317D1');
        $this->addSql('ALTER TABLE vehicle_assignement DROP FOREIGN KEY FK_6969CE1C545317D1');
        $this->addSql('ALTER TABLE sinister DROP FOREIGN KEY FK_73FC7B36545317D1');
        $this->addSql('DROP TABLE vehicle_checkout');
        $this->addSql('DROP TABLE vehicle_assignement');
        $this->addSql('DROP TABLE driver');
        $this->addSql('DROP TABLE vehicle');
        $this->addSql('DROP TABLE sinister');
    }
}
