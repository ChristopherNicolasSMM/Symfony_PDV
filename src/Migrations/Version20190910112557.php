<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190910112557 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TABLE categoria (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, categoria VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE categoria_pdv (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, descricao VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE composicao (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, unidade_id INTEGER NOT NULL, produto_id INTEGER DEFAULT NULL, sub_item VARCHAR(50) NOT NULL, quantidade INTEGER NOT NULL, custo DOUBLE PRECISION DEFAULT NULL, custo_total DOUBLE PRECISION DEFAULT NULL)');
        $this->addSql('CREATE INDEX IDX_1782307EEDF4B99B ON composicao (unidade_id)');
        $this->addSql('CREATE INDEX IDX_1782307E105CFD56 ON composicao (produto_id)');
        $this->addSql('CREATE TABLE fragmentacao (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, produto_id INTEGER DEFAULT NULL, quantidade INTEGER NOT NULL, unidade VARCHAR(255) NOT NULL, preco_parcial DOUBLE PRECISION NOT NULL)');
        $this->addSql('CREATE INDEX IDX_D8FF5AAB105CFD56 ON fragmentacao (produto_id)');
        $this->addSql('CREATE TABLE marca (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, marca VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE produto (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, unidade_id INTEGER NOT NULL, categoria_id INTEGER NOT NULL, sub_categoria_id INTEGER DEFAULT NULL, marca_id INTEGER DEFAULT NULL, ean VARCHAR(255) DEFAULT NULL, descricao VARCHAR(255) DEFAULT NULL, tipo_item VARCHAR(255) DEFAULT NULL, modelo VARCHAR(255) DEFAULT NULL, tags VARCHAR(255) DEFAULT NULL, cod_balanca INTEGER DEFAULT NULL, cod_interno VARCHAR(255) DEFAULT NULL, status BOOLEAN NOT NULL, preco_custo DOUBLE PRECISION DEFAULT NULL, preco_varejo DOUBLE PRECISION DEFAULT NULL, preco_atacado DOUBLE PRECISION DEFAULT NULL, qnt_atacado INTEGER DEFAULT NULL, mov_estoque BOOLEAN NOT NULL, tip_estoque VARCHAR(255) DEFAULT NULL, tipo_produto VARCHAR(255) DEFAULT NULL, ncm VARCHAR(255) DEFAULT NULL, origem VARCHAR(255) DEFAULT NULL, cest VARCHAR(255) DEFAULT NULL, categoria_pdv VARCHAR(255) DEFAULT NULL, rotulo_pdv VARCHAR(255) DEFAULT NULL, tags_pdv VARCHAR(255) DEFAULT NULL)');
        $this->addSql('CREATE INDEX IDX_5CAC49D7EDF4B99B ON produto (unidade_id)');
        $this->addSql('CREATE INDEX IDX_5CAC49D73397707A ON produto (categoria_id)');
        $this->addSql('CREATE INDEX IDX_5CAC49D724C5374C ON produto (sub_categoria_id)');
        $this->addSql('CREATE INDEX IDX_5CAC49D781EF0041 ON produto (marca_id)');
        $this->addSql('CREATE TABLE sub_categoria (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, sub_categoria VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE unidade (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, unidade_abv VARCHAR(3) NOT NULL, descricao VARCHAR(20) NOT NULL)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP TABLE categoria');
        $this->addSql('DROP TABLE categoria_pdv');
        $this->addSql('DROP TABLE composicao');
        $this->addSql('DROP TABLE fragmentacao');
        $this->addSql('DROP TABLE marca');
        $this->addSql('DROP TABLE produto');
        $this->addSql('DROP TABLE sub_categoria');
        $this->addSql('DROP TABLE unidade');
    }
}
