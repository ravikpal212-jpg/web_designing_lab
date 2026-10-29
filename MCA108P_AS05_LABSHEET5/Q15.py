from sqlalchemy import create_engine,Column,Integer,String
from sqlalchemy.orm import declarative_base,sessionmaker
engine=create_engine("mysql+mysqlconnector://root:@localhost/python_web_db")
Base=declarative_base()
class User(Base):
 __tablename__="orm_users"; id=Column(Integer,primary_key=True); name=Column(String(100),nullable=False); email=Column(String(150),nullable=False)
Base.metadata.create_all(engine); Session=sessionmaker(bind=engine); session=Session()
u=User(name="Ravi",email="ravi@example.com"); session.add(u); session.commit(); print("ORM user inserted with ID:",u.id); session.close()
