package repository

import (
	"database/sql"

	"github.com/l3onix/karty/internal/model"
)

type ClientRepository struct {
	dbConn *sql.DB
}

func NewClientRepository(dbConn *sql.DB) ClientRepository {
	return ClientRepository{
		dbConn: dbConn,
	}
}

func (this *ClientRepository) StoreNewClient(client model.Client) (int, error) {
	var id int

	query, err := this.dbConn.Prepare("insert into client (name) values ($1) returning id")
	if err != nil {
		return 0, err
	}

	err = query.QueryRow(client.Name).Scan(&id)
	if err != nil {
		return 0, err
	}

	query.Close()
	return id, nil
}

func (this *ClientRepository) GetClientById(id int) (*model.Client, error) {
	query, err := this.dbConn.Prepare("select * from client where id = $1")
	if err != nil {
		return nil, err
	}

	var client model.Client

	err = query.QueryRow(id).Scan(
		&client.ID,
		&client.Name,
	)
	if err != nil {
		return nil, err
	}

	query.Close()
	return &client, nil
}
