<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190912110426 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TABLE cfop (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, natureza_de_operacao_id INTEGER NOT NULL, cod_cfop VARCHAR(5) NOT NULL, descricao VARCHAR(255) NOT NULL, padao BOOLEAN NOT NULL)');
        $this->addSql('CREATE INDEX IDX_F6ED3637FF828283 ON cfop (natureza_de_operacao_id)');
        $this->addSql('CREATE TABLE natureza_de_operacao (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, abreviacao_cod VARCHAR(4) NOT NULL, nome VARCHAR(255) NOT NULL, descricao VARCHAR(255) NOT NULL, tipo VARCHAR(20) NOT NULL, status BOOLEAN NOT NULL, dentro_do_estado BOOLEAN NOT NULL, propria BOOLEAN NOT NULL)');
        $this->addSql('CREATE TABLE teste (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nome VARCHAR(255) NOT NULL, crm VARCHAR(255) NOT NULL)');
        $this->addSql('DROP INDEX IDX_1782307E105CFD56');
        $this->addSql('DROP INDEX IDX_1782307EEDF4B99B');
        $this->addSql('CREATE TEMPORARY TABLE __temp__composicao AS SELECT id, unidade_id, produto_id, sub_item, quantidade, custo, custo_total FROM composicao');
        $this->addSql('DROP TABLE composicao');
        $this->addSql('CREATE TABLE composicao (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, unidade_id INTEGER NOT NULL, produto_id INTEGER DEFAULT NULL, sub_item VARCHAR(50) NOT NULL COLLATE BINARY, quantidade INTEGER NOT NULL, custo DOUBLE PRECISION DEFAULT NULL, custo_total DOUBLE PRECISION DEFAULT NULL, CONSTRAINT FK_1782307EEDF4B99B FOREIGN KEY (unidade_id) REFERENCES unidade (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_1782307E105CFD56 FOREIGN KEY (produto_id) REFERENCES produto (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO composicao (id, unidade_id, produto_id, sub_item, quantidade, custo, custo_total) SELECT id, unidade_id, produto_id, sub_item, quantidade, custo, custo_total FROM __temp__composicao');
        $this->addSql('DROP TABLE __temp__composicao');
        $this->addSql('CREATE INDEX IDX_1782307E105CFD56 ON composicao (produto_id)');
        $this->addSql('CREATE INDEX IDX_1782307EEDF4B99B ON composicao (unidade_id)');
        $this->addSql('DROP INDEX IDX_D8FF5AAB105CFD56');
        $this->addSql('CREATE TEMPORARY TABLE __temp__fragmentacao AS SELECT id, produto_id, quantidade, unidade, preco_parcial FROM fragmentacao');
        $this->addSql('DROP TABLE fragmentacao');
        $this->addSql('CREATE TABLE fragmentacao (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, produto_id INTEGER DEFAULT NULL, quantidade INTEGER NOT NULL, unidade VARCHAR(255) NOT NULL COLLATE BINARY, preco_parcial DOUBLE PRECISION NOT NULL, CONSTRAINT FK_D8FF5AAB105CFD56 FOREIGN KEY (produto_id) REFERENCES produto (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO fragmentacao (id, produto_id, quantidade, unidade, preco_parcial) SELECT id, produto_id, quantidade, unidade, preco_parcial FROM __temp__fragmentacao');
        $this->addSql('DROP TABLE __temp__fragmentacao');
        $this->addSql('CREATE INDEX IDX_D8FF5AAB105CFD56 ON fragmentacao (produto_id)');
        $this->addSql('DROP INDEX IDX_5CAC49D781EF0041');
        $this->addSql('DROP INDEX IDX_5CAC49D724C5374C');
        $this->addSql('DROP INDEX IDX_5CAC49D73397707A');
        $this->addSql('DROP INDEX IDX_5CAC49D7EDF4B99B');
        $this->addSql('CREATE TEMPORARY TABLE __temp__produto AS SELECT id, unidade_id, categoria_id, sub_categoria_id, marca_id, ean, descricao, tipo_item, modelo, tags, cod_balanca, cod_interno, status, preco_custo, preco_varejo, preco_atacado, qnt_atacado, mov_estoque, tip_estoque, tipo_produto, ncm, origem, cest, categoria_pdv, rotulo_pdv, tags_pdv FROM produto');
        $this->addSql('DROP TABLE produto');
        $this->addSql('CREATE TABLE produto (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, unidade_id INTEGER NOT NULL, categoria_id INTEGER NOT NULL, sub_categoria_id INTEGER DEFAULT NULL, marca_id INTEGER DEFAULT NULL, ean VARCHAR(255) DEFAULT NULL COLLATE BINARY, descricao VARCHAR(255) DEFAULT NULL COLLATE BINARY, tipo_item VARCHAR(255) DEFAULT NULL COLLATE BINARY, modelo VARCHAR(255) DEFAULT NULL COLLATE BINARY, tags VARCHAR(255) DEFAULT NULL COLLATE BINARY, cod_balanca INTEGER DEFAULT NULL, cod_interno VARCHAR(255) DEFAULT NULL COLLATE BINARY, status BOOLEAN NOT NULL, preco_custo DOUBLE PRECISION DEFAULT NULL, preco_varejo DOUBLE PRECISION DEFAULT NULL, preco_atacado DOUBLE PRECISION DEFAULT NULL, qnt_atacado INTEGER DEFAULT NULL, mov_estoque BOOLEAN NOT NULL, tip_estoque VARCHAR(255) DEFAULT NULL COLLATE BINARY, tipo_produto VARCHAR(255) DEFAULT NULL COLLATE BINARY, ncm VARCHAR(255) DEFAULT NULL COLLATE BINARY, origem VARCHAR(255) DEFAULT NULL COLLATE BINARY, cest VARCHAR(255) DEFAULT NULL COLLATE BINARY, categoria_pdv VARCHAR(255) DEFAULT NULL COLLATE BINARY, rotulo_pdv VARCHAR(255) DEFAULT NULL COLLATE BINARY, tags_pdv VARCHAR(255) DEFAULT NULL COLLATE BINARY, CONSTRAINT FK_5CAC49D7EDF4B99B FOREIGN KEY (unidade_id) REFERENCES unidade (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_5CAC49D73397707A FOREIGN KEY (categoria_id) REFERENCES categoria (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_5CAC49D724C5374C FOREIGN KEY (sub_categoria_id) REFERENCES sub_categoria (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_5CAC49D781EF0041 FOREIGN KEY (marca_id) REFERENCES marca (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO produto (id, unidade_id, categoria_id, sub_categoria_id, marca_id, ean, descricao, tipo_item, modelo, tags, cod_balanca, cod_interno, status, preco_custo, preco_varejo, preco_atacado, qnt_atacado, mov_estoque, tip_estoque, tipo_produto, ncm, origem, cest, categoria_pdv, rotulo_pdv, tags_pdv) SELECT id, unidade_id, categoria_id, sub_categoria_id, marca_id, ean, descricao, tipo_item, modelo, tags, cod_balanca, cod_interno, status, preco_custo, preco_varejo, preco_atacado, qnt_atacado, mov_estoque, tip_estoque, tipo_produto, ncm, origem, cest, categoria_pdv, rotulo_pdv, tags_pdv FROM __temp__produto');
        $this->addSql('DROP TABLE __temp__produto');
        $this->addSql('CREATE INDEX IDX_5CAC49D781EF0041 ON produto (marca_id)');
        $this->addSql('CREATE INDEX IDX_5CAC49D724C5374C ON produto (sub_categoria_id)');
        $this->addSql('CREATE INDEX IDX_5CAC49D73397707A ON produto (categoria_id)');
        $this->addSql('CREATE INDEX IDX_5CAC49D7EDF4B99B ON produto (unidade_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP TABLE cfop');
        $this->addSql('DROP TABLE natureza_de_operacao');
        $this->addSql('DROP TABLE teste');
        $this->addSql('DROP INDEX IDX_1782307EEDF4B99B');
        $this->addSql('DROP INDEX IDX_1782307E105CFD56');
        $this->addSql('CREATE TEMPORARY TABLE __temp__composicao AS SELECT id, unidade_id, produto_id, sub_item, quantidade, custo, custo_total FROM composicao');
        $this->addSql('DROP TABLE composicao');
        $this->addSql('CREATE TABLE composicao (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, unidade_id INTEGER NOT NULL, produto_id INTEGER DEFAULT NULL, sub_item VARCHAR(50) NOT NULL, quantidade INTEGER NOT NULL, custo DOUBLE PRECISION DEFAULT NULL, custo_total DOUBLE PRECISION DEFAULT NULL)');
        $this->addSql('INSERT INTO composicao (id, unidade_id, produto_id, sub_item, quantidade, custo, custo_total) SELECT id, unidade_id, produto_id, sub_item, quantidade, custo, custo_total FROM __temp__composicao');
        $this->addSql('DROP TABLE __temp__composicao');
        $this->addSql('CREATE INDEX IDX_1782307EEDF4B99B ON composicao (unidade_id)');
        $this->addSql('CREATE INDEX IDX_1782307E105CFD56 ON composicao (produto_id)');
        $this->addSql('DROP INDEX IDX_D8FF5AAB105CFD56');
        $this->addSql('CREATE TEMPORARY TABLE __temp__fragmentacao AS SELECT id, produto_id, quantidade, unidade, preco_parcial FROM fragmentacao');
        $this->addSql('DROP TABLE fragmentacao');
        $this->addSql('CREATE TABLE fragmentacao (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, produto_id INTEGER DEFAULT NULL, quantidade INTEGER NOT NULL, unidade VARCHAR(255) NOT NULL, preco_parcial DOUBLE PRECISION NOT NULL)');
        $this->addSql('INSERT INTO fragmentacao (id, produto_id, quantidade, unidade, preco_parcial) SELECT id, produto_id, quantidade, unidade, preco_parcial FROM __temp__fragmentacao');
        $this->addSql('DROP TABLE __temp__fragmentacao');
        $this->addSql('CREATE INDEX IDX_D8FF5AAB105CFD56 ON fragmentacao (produto_id)');
        $this->addSql('DROP INDEX IDX_5CAC49D7EDF4B99B');
        $this->addSql('DROP INDEX IDX_5CAC49D73397707A');
        $this->addSql('DROP INDEX IDX_5CAC49D724C5374C');
        $this->addSql('DROP INDEX IDX_5CAC49D781EF0041');
        $this->addSql('CREATE TEMPORARY TABLE __temp__produto AS SELECT id, unidade_id, categoria_id, sub_categoria_id, marca_id, ean, descricao, tipo_item, modelo, tags, cod_balanca, cod_interno, status, preco_custo, preco_varejo, preco_atacado, qnt_atacado, mov_estoque, tip_estoque, tipo_produto, ncm, origem, cest, categoria_pdv, rotulo_pdv, tags_pdv FROM produto');
        $this->addSql('DROP TABLE produto');
        $this->addSql('CREATE TABLE produto (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, unidade_id INTEGER NOT NULL, categoria_id INTEGER NOT NULL, sub_categoria_id INTEGER DEFAULT NULL, marca_id INTEGER DEFAULT NULL, ean VARCHAR(255) DEFAULT NULL, descricao VARCHAR(255) DEFAULT NULL, tipo_item VARCHAR(255) DEFAULT NULL, modelo VARCHAR(255) DEFAULT NULL, tags VARCHAR(255) DEFAULT NULL, cod_balanca INTEGER DEFAULT NULL, cod_interno VARCHAR(255) DEFAULT NULL, status BOOLEAN NOT NULL, preco_custo DOUBLE PRECISION DEFAULT NULL, preco_varejo DOUBLE PRECISION DEFAULT NULL, preco_atacado DOUBLE PRECISION DEFAULT NULL, qnt_atacado INTEGER DEFAULT NULL, mov_estoque BOOLEAN NOT NULL, tip_estoque VARCHAR(255) DEFAULT NULL, tipo_produto VARCHAR(255) DEFAULT NULL, ncm VARCHAR(255) DEFAULT NULL, origem VARCHAR(255) DEFAULT NULL, cest VARCHAR(255) DEFAULT NULL, categoria_pdv VARCHAR(255) DEFAULT NULL, rotulo_pdv VARCHAR(255) DEFAULT NULL, tags_pdv VARCHAR(255) DEFAULT NULL)');
        $this->addSql('INSERT INTO produto (id, unidade_id, categoria_id, sub_categoria_id, marca_id, ean, descricao, tipo_item, modelo, tags, cod_balanca, cod_interno, status, preco_custo, preco_varejo, preco_atacado, qnt_atacado, mov_estoque, tip_estoque, tipo_produto, ncm, origem, cest, categoria_pdv, rotulo_pdv, tags_pdv) SELECT id, unidade_id, categoria_id, sub_categoria_id, marca_id, ean, descricao, tipo_item, modelo, tags, cod_balanca, cod_interno, status, preco_custo, preco_varejo, preco_atacado, qnt_atacado, mov_estoque, tip_estoque, tipo_produto, ncm, origem, cest, categoria_pdv, rotulo_pdv, tags_pdv FROM __temp__produto');
        $this->addSql('DROP TABLE __temp__produto');
        $this->addSql('CREATE INDEX IDX_5CAC49D7EDF4B99B ON produto (unidade_id)');
        $this->addSql('CREATE INDEX IDX_5CAC49D73397707A ON produto (categoria_id)');
        $this->addSql('CREATE INDEX IDX_5CAC49D724C5374C ON produto (sub_categoria_id)');
        $this->addSql('CREATE INDEX IDX_5CAC49D781EF0041 ON produto (marca_id)');
    }
}
