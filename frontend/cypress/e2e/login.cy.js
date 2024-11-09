describe('teste login', () => {
    it('visita a pagina ed login', () => {
      cy.visit('/login')
      cy.contains('h2', 'Login')
      cy.get('#email').type('teste@edu.com')
      cy.get('#password').type('senha123')
      cy.get(':nth-child(3) > button').click()
    })
  })
  