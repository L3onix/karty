package main

import (
	"github.com/gin-gonic/gin"
	"github.com/l3onix/karty/internal"
	"github.com/l3onix/karty/pkg/db"
)

func main() {
	dbConn, err := db.ConnectionDB()
	if err != nil {
		panic(err)
	}
	dbConn.Ping()

	server := gin.Default()
	internal.SetupRoutes(server)
	server.Run(":8080")
}
