package model

type Client struct {
	ID   int
	Name string
}

func NewClient(id int, name string) Client {
	var client Client

	if id != 0 {
		client.ID = id
	}
	if name != "" {
		client.Name = name
	}

	return client
}
