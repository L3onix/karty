package internal

import (
	"github.com/gin-gonic/gin"
	"github.com/l3onix/karty/internal/controller"
	"github.com/l3onix/karty/internal/factory"
)

func SetupRoutes(server *gin.Engine) {

	// /client routes
	clientFactory := factory.NewClientFactory(nil)
	var clientController controller.ClientController = clientFactory.GetController()
	server.GET("/client", clientController.CreateClient)
}
