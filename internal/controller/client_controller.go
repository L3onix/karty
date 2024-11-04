package controller

import (
	"net/http"

	"github.com/gin-gonic/gin"
	"github.com/l3onix/karty/internal/model"
	"github.com/l3onix/karty/internal/service"
)

type ClientController struct {
	service service.ClientService
}

func NewClientController(service service.ClientService) ClientController {
	return ClientController{
		service: service,
	}
}

func (this *ClientController) GetClientById(ctx *gin.Context) {
	ctx.JSON(http.StatusOK, nil)
}

func (this *ClientController) CreateClient(ctx *gin.Context) {
	var client model.Client
	err := ctx.ShouldBindJSON(&client)
	if err != nil {
		ctx.JSON(http.StatusBadRequest, gin.H{"error": err.Error()})
	}

	createdClient, err := this.service.CreateNewClient(client)
	if err != nil {
		ctx.JSON(http.StatusBadRequest, gin.H{"error": err.Error()})
	}

	ctx.JSON(http.StatusOK, createdClient)
}
