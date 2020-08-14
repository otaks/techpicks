package main

import (
	"database/sql"
	"log"
	"testing"

	_ "github.com/go-sql-driver/mysql"
	"gopkg.in/testfixtures.v2"
)

var (
	db       *sql.DB
	fixtures *testfixtures.Context
)

//func TestMain(m *testing.M) {
func main() {
	var err error

	// Open connection with the test database.
	// Do NOT import fixtures in a production database!
	// Existing data would be deleted
	db, err = sql.Open("mysql", "cm_user:password@tcp(localhost:3306)/tp_db_test")
	if err != nil {
		log.Fatal(err)
	}

	// creating the context that hold the fixtures
	// see about all compatible databases in this page below
	fixtures, err = testfixtures.NewFolder(db, &testfixtures.MySQL{}, "fixtures")
	if err != nil {
		log.Fatal(err)
	}

	//os.Exit(m.Run())
	prepareTestDatabase()
}

func prepareTestDatabase() {
	if err := fixtures.Load(); err != nil {
		log.Fatal(err)
	}
}

func TestX(t *testing.T) {
	prepareTestDatabase()
	// your test here ...
}

func TestY(t *testing.T) {
	prepareTestDatabase()
	// your test here ...
}

func TestZ(t *testing.T) {
	prepareTestDatabase()
	// your test here ...
}
