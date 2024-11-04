package factory

import (
	"database/sql"

	"github.com/l3onix/karty/internal/controller"
	"github.com/l3onix/karty/internal/repository"
	"github.com/l3onix/karty/internal/service"
	"github.com/l3onix/karty/pkg/db"
)

type ClientFactory struct {
	DbConn *sql.DB
}

func NewClientFactory(dbConn *sql.DB) ClientFactory {
	if dbConn != nil {
		return ClientFactory{
			DbConn: dbConn,
		}
	}
	dbConn, err := db.ConnectionDB()
	if err != nil {
		panic(err)
	}
	return ClientFactory{
		DbConn: dbConn,
	}
}

func (this *ClientFactory) GetController() controller.ClientController {
	return controller.NewClientController(this.GetService())
}

func (this *ClientFactory) GetService() service.ClientService {
	return service.NewClientService(this.GetRepository())
}

func (this *ClientFactory) GetRepository() repository.ClientRepository {
	return repository.NewClientRepository(this.DbConn)
}
