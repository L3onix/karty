package service

import (
	"github.com/l3onix/karty/internal/model"
	"github.com/l3onix/karty/internal/repository"
)

type ClientService struct {
	repository repository.ClientRepository
}

func NewClientService(repository repository.ClientRepository) ClientService {
	return ClientService{
		repository: repository,
	}
}

func (this *ClientService) CreateNewClient(client model.Client) (model.Client, error) {
	id, err := this.repository.StoreNewClient(client)
	if err != nil {
		return model.Client{}, err
	}

	client.ID = id
	return client, err
}
